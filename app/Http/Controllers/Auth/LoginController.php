<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\deposit;
use App\Models\UserRegistration;
use App\Models\Withdraw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\User;
use App\Models\User as ModelsUser;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\support\Str;

class LoginController extends Controller
{



public function login()
{
    return view('Auth.login');
}

public function postLogin(Request $request)
{

    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $credentials = [
        "email" => $request['email'],
        "password" => $request['password'],
    ];
    if (Auth::attempt($credentials)) {

        if (auth()->user()->isActive == '1') {
            
            return (redirect(route('dashboard')))->with('success', 'You have Successfully loggedin');
        } else {
            return redirect((route('login')))->with('info', "Sorry Your Account is Blocked,You Contact Admin");
        }
    }
    return redirect((route('login')))->with('danger', 'Oppes! You have entered invalid credentials');

}

public function dashboard()
{
    $userRegistration = UserRegistration::orderBy('created_at', 'desc')->take(5)->get();
    $totalUserCount = $userRegistration->count();
    $deposit = deposit::orderBy('created_at', 'desc')->take(5)->get();
    $withdraws = Withdraw::orderBy('created_at', 'desc')->take(5)->get();
    $totalDeopsiteCount = $deposit->count();
    $totalDepositAmount = Deposit::sum('deposit_amount');
    return view('dashboard',compact('userRegistration','deposit','totalUserCount','totalDeopsiteCount','totalDepositAmount','withdraws'));
}

public function logout(Request $request)
{
    Auth::logout(); // Log the user out

    $request->session()->invalidate(); // Invalidate the session

    return redirect('/'); // Redirect to the homepage or any desired page
}


public function showForgetPasswordForm()
{
    return view('Auth.forgetpassword');
}



public function submitForgetPasswordForm(Request $request)
{

    $request->validate([
        'email' => 'required|email|exists:users',
    ]);

    $token = Str::random(64);

    $existingToken = DB::table('password_reset_tokens')->where('email', $request->email)->first();

if ($existingToken) {
// Delete the existing token entry
DB::table('password_reset_tokens')->where('email', $request->email)->delete();
}

    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now()
    ]);

    try {
       Mail::send('email.restpassword', ['token' => $token], function ($message) use ($request) {
           $message->to($request->email);
           $message->subject('Reset Password');
       });

       return back()->with('success', 'We have e-mailed your password reset link!');
   } catch (\Exception $e) {
       // Log or handle the exception
       return back()->withErrors(['email' => 'Email sending failed']);
}
}

public function showResetPasswordForm($token)
{
    return view('Auth.resetpasswordlink', ['token' => $token]);
}


public function submitResetPasswordForm(Request $request)
{
// dd($request);
 $data = $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|confirmed',
        'password_confirmation' => 'required'
    ]);
// dd($data);
    $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token
        ])
        ->first();
    // dd($updatePassword);
    if (!$updatePassword) {
        return back()->with('danger', 'Invalid Email!');
    }

    $user = ModelsUser::where('email', $request->email)
        ->update(['password' => Hash::make($request->password)]);
// dd( $user);
    DB::table('password_reset_tokens')->where(['email' => $request->email])->delete();

    return redirect()->to(route('login'))->with('success', 'Your password has been changed!');
}



}