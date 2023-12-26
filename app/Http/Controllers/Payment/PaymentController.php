<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\deposit;
use App\Models\PlatformDetails;
use App\Models\User;
use App\Models\UserRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
   public function index()
   {
      $players = UserRegistration::with('platformDetails')
         ->whereHas('platformDetails', function ($query) {
            $query->where('status', 'Active');
         })
         ->get();
      // dd($players);
      // $data = PlatformDetails::where('status', "Active")->get();
      // dd($data);
      // $data = deposit::get();
      return view('payment.index', compact('players'));
   }

   public function deposit()
   {
      $deposit = deposit::get();
      return view('payment.deposit', compact('deposit'));
   }
}
