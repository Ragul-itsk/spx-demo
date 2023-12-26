<?php

namespace App\Http\Controllers\Payment;

use App\Exports\DepositExport;
use App\Exports\WithdrawExport;
use App\Http\Controllers\Controller;
use App\Models\bank_detail;
use App\Models\PlatForm;
use App\Models\PlatformDetails;
use App\Models\User;
use App\Models\UserRegistration;
use App\Models\Withdraw;
use App\Models\WithdrawUtr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Yajra\DataTables\DataTables;

class WithdrawController extends Controller
{
    public function index()
    {


        $withdraws = Withdraw::with('platformDetail.player', 'bank', 'employee')->get();
        // dd($withdraws->platformDetail[0]);
        // dd($withdraws);
        return view('withdraw.all_withdraw', compact('withdraws'));
    }
    
    public function allWithdrawDatas()
    {

        $withdraw = Withdraw::with('platformDetail.player', 'bank', 'employee','withdrawUtr')
            ->select([
                'withdraws.id',
                'withdraws.amount',
                'withdraws.d_chips',
                'withdraws.image',
                'withdraws.rolling_type',
                'withdraws.admin_status',
                'withdraws.banker_status',
                'withdraws.isInformed',
                'withdraws.created_by',
                'withdraws.platform_detail_id',
                'withdraws.bank_name_id',
            ])->orderBy('withdraws.created_at', 'desc');

        // dd($withdraw);
        return DataTables::of($withdraw)
        ->addColumn('player_name', function ($withdraw) {
            return $withdraw->platformDetail->platform_username ?? '-';
        })
        
            
            ->addColumn('account_number', function ($withdraw) {
                return $withdraw->bank->account_number ?? '-';
            })
            ->addColumn('bank_name', function ($withdraw) {
                return $withdraw->bank->bank_name ?? '-';
            })
            ->addColumn('withdraw_utr', function ($withdraw) {
                return $withdraw->withdrawUtr->utr ?? '-';
            })
            ->addColumn('platform_name', function ($withdraw) {
                return $withdraw->platformDetail->platform->name ?? '-';
            })
            ->addColumn('created_by', function ($withdraw) {
                return $withdraw->employee->name ?? '-';
            })
            ->addColumn('image', function ($withdraw) {
                $imagePath = 'storage/' . $withdraw->image;
                $imageUrl = asset($imagePath);

                // Check if the image file exists
                if (file_exists(public_path($imagePath))) {
                    return $imageUrl;
                    // If the image exists, show it in a modal
                    // return '<a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="' . $imageUrl . '"><img src="' . $imageUrl . '" alt="Image" style="max-width: 100px; max-height: 100px;"></a>';
                } else {
                    // If the image doesn't exist, show a placeholder text
                    return 'No Image';
                }
            })
            ->rawColumns(['image'])

            ->make(true);
    }
    
    public function allWithdrawReports(Request $request)
    {

        $filters = $request->all();
        $withdraws = DB::table('withdraws')
            ->join('platform_details', 'withdraws.platform_detail_id', '=', 'platform_details.id')
            ->join('bank_details', 'withdraws.bank_name_id', '=', 'bank_details.id')
            ->leftJoin('users', 'withdraws.created_by', '=', 'users.id')
            ->leftJoin('withdraw_utrs', 'withdraws.id', '=', 'withdraw_utrs.withdraw_id')

            ->select([
                'withdraws.id',
                DB::raw('DATE(withdraws.created_at) as created_at'),
                'platform_details.platform_username',
                'bank_details.bank_name',
                'bank_details.account_number',
                'withdraws.amount',
                'withdraws.d_chips',
                'withdraws.image',
                'withdraws.rolling_type',
                'withdraws.admin_status',
                'withdraws.banker_status',
                'withdraws.isInformed',
                'users.name',
                'withdraw_utrs.utr',
            ])
            ->when(isset($filters['start_date']), function ($query) use ($filters) {
                return $query->whereDate('withdraws.created_at', '>=', $filters['start_date']);
            })
            ->when(isset($filters['end_date']), function ($query) use ($filters) {
                return $query->whereDate('withdraws.created_at', '<=', $filters['end_date']);
            })
            ->when(isset($filters['created_by']), function ($query) use ($filters) {
                return $query->where('withdraws.created_by', $filters['created_by']);
            })
            ->when(isset($filters['platform']), function ($query) use ($filters) {
                return $query->where('platform_details.platform_id', $filters['platform']);
            })
            ->orderBy('withdraws.created_at', 'desc')
            ->get();

        $totalWithdrawAmount = $withdraws->sum('amount');
        $totalRecords = $withdraws->count();
        return DataTables::of($withdraws)
            ->addColumn('player_name', function ($withdraw) {
                return $withdraw->platform_username ?? '-';
            })
            ->addColumn('bank_name', function ($withdraw) {
                return $withdraw->bank_name ?? '-';
            })
            ->addColumn('account_number', function ($withdraw) {
                return $withdraw->account_number ?? '-';
            })
            ->addColumn('created_by', function ($withdraw) {
                return $withdraw->name ?? '-';
            })
            ->addColumn('withdraw_utr', function ($withdraw) {
                return $withdraw->utr ?? '-';
            })
            ->addColumn('image', function ($withdraw) {
                $imagePath = 'storage/' . $withdraw->image;
                $imageUrl = asset($imagePath);

                // Check if the image file exists
                if (file_exists(public_path($imagePath))) {
                    // If the image exists, show it in a modal
                    return '<a href="#" class="image-link" data-toggle="modal" data-target="#imageModal" data-image="' . $imageUrl . '"><img src="' . $imageUrl . '" alt="Image" style="max-width: 100px; max-height: 100px;"></a>';
                } else {
                    // If the image doesn't exist, show a placeholder text
                    return 'No Image';
                }
            })
            ->rawColumns(['image'])
            ->with([
                'totalWithdrawAmount' => $totalWithdrawAmount,
                'totalRecords' => $totalRecords,
            ])
            ->make(true);
    }

    public function exportAllWithdrawResults(Request $request)
    {
        try {
            $filters = $request->all();
            $withdraws = DB::table('withdraws')
                ->join('platform_details', 'withdraws.platform_detail_id', '=', 'platform_details.id')
                ->join('bank_details', 'withdraws.bank_name_id', '=', 'bank_details.id')
                ->leftJoin('users', 'withdraws.created_by', '=', 'users.id')
                ->leftJoin('withdraw_utrs', 'withdraws.id', '=', 'withdraw_utrs.withdraw_id')

                ->select([
                    'withdraws.id',
                    DB::raw('DATE(withdraws.created_at) as created_at'),
                    'platform_details.platform_username',
                    'bank_details.bank_name',
                    'bank_details.account_number',
                    'withdraw_utrs.utr',
                    'withdraws.amount',
                    'withdraws.d_chips',
                    'withdraws.rolling_type',
                    'withdraws.admin_status',
                    'withdraws.banker_status',
                    'withdraws.isInformed',
                    'users.name',
                ])
                ->when(isset($filters['start_date']), function ($query) use ($filters) {
                    return $query->whereDate('withdraws.created_at', '>=', $filters['start_date']);
                })
                ->when(isset($filters['end_date']), function ($query) use ($filters) {
                    return $query->whereDate('withdraws.created_at', '<=', $filters['end_date']);
                })
                ->when(isset($filters['created_by']), function ($query) use ($filters) {
                    return $query->where('withdraws.created_by', $filters['created_by']);
                })
                ->when(isset($filters['platform']), function ($query) use ($filters) {
                    return $query->where('platform_details.platform_id', $filters['platform']);
                })
                ->orderBy('withdraws.created_at', 'desc')
                ->get();

            foreach ($withdraws as $withdraw) {
                $withdraw->isInformed = $withdraw->isInformed ? 'Yes' : 'No';
            }
            return Excel::download(new WithdrawExport($withdraws), 'Withdraw.xlsx');
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function withdrawPending()
    {

        // dd(UserRegistration::with('platformDetails', 'platformDetails.platform', 'platformDetails.deposit')->get());
        $user = auth()->user();
        if ($user->roles[0]->hasPermissionTo('CC DPending') && $user->roles[0]->hasPermissionTo('CC WPending')) {
            $withdraws = Withdraw::where('status', 'On Process')->get();
        } else {
            if ($user->roles[0]->hasPermissionTo('Withdraw Banker Enable')) {
                $withdraws = Withdraw::where('banker_status', 'pending')->get();
            }
            if ($user->roles[0]->hasPermissionTo('Withdraw Admin Enable')) {
                $withdraws = Withdraw::where('admin_status', 'pending')->get();
            }
        }

        // dd($deposit);
        return view('withdraw.index', compact('withdraws'));
    }

    public function withdrawPendingcc()
    {

        $user = auth()->user();
        $withdraws = Withdraw::where('status', 'Completed')->where('isInformed', 0)->get();

        return view('withdraw.cc', compact('withdraws'));
    }
    public function withdraw_status(Request $request)
    {
        // dd($request->all());
        $new_status = $request['selectedValue'];
        $userid = $request['userid'];
        $type = $request['type'];
        $platformId = $request['platform_id'];
        $userId = $request['userId'];
        $userPassword = $request['userPassword'];
        $rollover = $request['rollover'];
        $banker_status = "";
        $image_path = $request['imagePath'];
        $remark = $request['remark'];
        $d_chips = $request['d_chips'];
        $up_amt = $request['withdraw_amt'];

        // $user = User::where('id', $userid)->update(['status' => $new_status]);
        if ($type == 'withdraw_admin') {
            if ($new_status == "Verified") {
                $banker_status = "Pending";

                $withdraw = Withdraw::where('id', $userid)->update([
                    'admin_status' => $new_status,
                    'banker_status' => $banker_status,
                    'rolling_type' => $rollover,
                    'd_chips'=>$d_chips,
                    // 'amount' =>$up_amt
    
                ]);
            }
            if($new_status == "Rejected"){
                $withdraw = Withdraw::where('id', $userid)->update([
                    'admin_status' => $new_status,
                    'banker_status' => "Not Verified",
                    'status' => "Completed",
                    'remark' => $remark,
                    'isInformed' => "0"
                ]);
            }
            if ($new_status == "Pending") {
                $banker_status = "Not Verified";
            }
            
        }

        if ($type == 'withdraw_banker') {
            if ($new_status == "Verified") {
                //Check the utr is exist
                $withdrawUtr = WithdrawUtr::where('utr', $request->input('withdrawUtr'))->get();
                if ($withdrawUtr->isEmpty()) {
                    if ($request->hasFile('image')) {
                        // Get the uploaded file
                        $image = $request->file('image');

                        // Store the image and get its path (you can customize the path as needed)
                        $imagePath = $image->store('withdraw_image', 'public');
                    }

                    $withdraw = Withdraw::where('id', $userid)->update([
                        'banker_status' => $new_status,
                        'image' => $imagePath,
                        'isInformed' => "0",
                        'status' => "Completed"
                    ]);
                    // Fetch the updated model
                    $withdraw = Withdraw::find($userid);
                    $withdraw_utr = WithdrawUtr::create([
                        'withdraw_id' => $withdraw->id,
                        'utr' => $request->input('withdrawUtr'),

                    ]);
                } else {
                    $result = [
                        "flag" => 0,
                        "status" => "UTR Exist",
                    ];

                    return response()->json([($result)]);
                }
            }
            if($new_status == "Rejected"){
                $withdraw = Withdraw::where('id', $userid)->update([
                    'banker_status' => $new_status,
                    'status' => "Completed",
                    'remark' => $remark,
                    'isInformed' => "0"
                ]);
            }
            if ($new_status == "Pending") {
                $withdraw = Withdraw::where('id', $userid)->update(['banker_status' => $new_status]);
            }
        }

        if ($type == 'withdraw_cc') {
            $withdraw = Withdraw::where('id', $userid)->update([
                'isInformed' => 1,
            ]);
        }

        $result = [
            "flag" => 1,
            "status" => "Status Updated",
            "withdraw_status" => $banker_status
        ];

        return response()->json([($result)]);
    }

    public function create()
    {
        $gameusernamedetails = PlatformDetails::where('status', 'Active')->get();
        // dd($gameusernamedetails);
        $data = UserRegistration::get();

        $platform = PlatForm::get();
        return view('withdraw.create', compact('data', 'platform', 'gameusernamedetails'));
    }


    public function fetchBanks(Request $request)
    {


        $platform_details_id = $request->country_id;
        $platform_details = PlatformDetails::where('id', $platform_details_id)->first();
        $data['states'] = bank_detail::where("player_id", $platform_details->player_id)
            ->get(["bank_name", "id"]);




        return response()->json($data);
    }

    public function fetchBankDetails(Request $request)
    {


        $bankId = $request->input('bank_id');

        $bankDetails = bank_detail::where('id', $bankId)->with('player')->first();
        // dd($bankDetails);
        // dd($bankDetails);
        if ($bankDetails) {
            // Return bank details as JSON response
            return response()->json([
                'name' => $bankDetails->player->name,
                'mobile' => $bankDetails->player->mobile,
                // 'name' => $bankDetails->player->name,
                'account_id' => $bankDetails->account_number,
                'account_holder_name' => $bankDetails->account_name,
                'ifsc_code' => $bankDetails->ifsc_code,

            ]);
        } else {
            // Handle the case where bank details are not found
            return response()->json(['error' => 'Bank details not found'], 404);
        }
    }
    public function store(Request $request)
    {
        $auth_id = Auth::user()->id;
        
        $request->validate([
            'user_id' => 'required',
            'bank_name_id' => 'required',
            'amount' => 'required',

        ]);
        $userSelection = $request->input('user_id');


        // Split the "id" and "name" values using the delimiter (comma)
        // $data =  list($userId, $userName) = explode(',', $userSelection);
        // $value1 = $data[0];
        // $value2 = $data[1];

        // $platform_details_id = PlatformDetails::where('player_id', $request->input('user_id'))->where('platform_id', $value2)->first();

        $withdraw = Withdraw::create([
            'platform_detail_id' => $request->input('user_id'),
            'bank_name_id' => $request->input('bank_name_id'),
            'amount' => $request->input('amount'),
            'rolling_type' => "No",
            'admin_status' => "Pending",
            'banker_status' => "Not Verified",
            'status' => "On Process",
            'created_by' => $auth_id
        ]);
        return redirect()->route('withdraw.pending');
    }

    public function edit($id)
    {

        $data = withdraw::find($id);
        $platform = PlatForm::all();
        return view('withdraw.edit', compact('data', 'platform',));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'platform' => 'required',
            'bank_name_id' => 'required',
            'amount' => 'required',
            'rolling_type' => 'required',
        ]);

        $withdrawal = Withdraw::findOrFail($id);
        $withdrawal->user_id = $request->input('user_id');
        $withdrawal->platform_id = $request->input('platform');
        $withdrawal->bank_name_id = $request->input('bank_name_id');
        $withdrawal->amount = $request->input('amount');
        $withdrawal->rolling_type = $request->input('rolling_type');

        $withdrawal->save();

        return redirect()->route('withdraw.index');
    }



    public function delete(string $id)
    {
        $withdraw = Withdraw::find($id);
        $withdraw->delete();

        if ($withdraw) {
            return redirect()->route('withdraw.index')
                ->with('success', 'User deleted successfully');
        }

        return back()->with('failure', 'Please try again');
    }

    public function report()
    {
        $withdrawal = Withdraw::where('status', 'Completed')->where('admin_status', 'Verified')->where('banker_status', 'Verified')->where('isInformed', "1")->get();
        $withdrawCount = $withdrawal->count();
        $totalAmount = $withdrawal->sum('amount');
        $created_by = User::all();
        $platforms = PlatForm::all();
        return view('Report.withdraw_report', [
            'withdrawal' => $withdrawal,
            'withdrawal_count' => $withdrawCount,
            'total_amount' => $totalAmount,
            'created_by' => $created_by,
            'platforms' => $platforms
        ]);
    }

    public function filter(Request $request)
    {
        // Get Dates
        $isInformed = $request['isinformed'];
        $adminStatus = $request['admin_status'];

        $toDate = $request['to_date'];
        $isInformedValue = "";
        if ($isInformed == "Verified") {
            $isInformedValue = 1;
        } else {
            $isInformedValue = 0;
        }
        // Query the database based on the filter criteria
        // Eloquent to fetch the filtered data
        $query = Deposit::query();

        // Add conditions based on filter criteria
        if ($request->has('isinformed')) {
            $query->where('isInformed', $isInformedValue);
        }

        if ($request->has('banker_status')) {
            $query->where('banker_status', $request->input('banker_status'));
        }
        if ($request->has('admin_status')) {
            $query->where('admin_status', $request->input('admin_status'));
        }

        if ($request->filled('from_date')) {
            $fromDate = $request['from_date'];
            $query->whereDate('created_at', '>=', $fromDate);
        }

        if ($request->filled('to_date')) {
            $toDate = $request->input('to_date');
            $query->whereDate('created_at', '<=', $toDate);
        }

        // Execute the query and get the filtered data
        $filteredData = $query->with('platformDetail.player', 'ourBankDetail')->get();
        // $filteredData = Deposit::where(...)->get();

        return response()->json($filteredData);
    }
    public function submitForm(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'account_name' => 'required',
            'account_number' => 'required',
            'ifsc_code' => 'required',
            'bank_name' => 'required',
        ]);


        $platformtableid = $request->user_id;
        $platformdetailid = PlatformDetails::where('id',$platformtableid)->first();
        $playerid = $platformdetailid->player_id;


        bank_detail::create([
            'player_id' => $playerid,
            'account_name' => $request->account_name,
            'account_number' => $request->account_number,
            'ifsc_code' => $request->ifsc_code,
            'bank_name' => $request->bank_name,
        ]);

        // Redirect back or wherever you want after submission
        return redirect()->back()->with('success', 'Form submitted successfully!');
    }

    public function submitutrForm(Request $request)
    {
        // dd($request);
        $request->validate([
            'user_id' => 'required',
            'upi' => 'required',


        ]);


        $platformtableid = $request->user_id;
        $platformdetailid = PlatformDetails::where('id',$platformtableid)->first();
        $playerid = $platformdetailid->player_id;

        bank_detail::create([
            'player_id' => $playerid,
            'upi' => $request->upi,
            'bank_name' => $request->upi,

        ]);

        return redirect()->back()->with('success', 'Form submitted successfully!');

    }
}
