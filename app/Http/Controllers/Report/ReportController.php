<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\deposit;
use App\Models\UserRegistration;
use Illuminate\Http\Request;

class ReportController extends Controller
{

    public function userReport()
    {
        $userRegistration = UserRegistration::get();
        // dd( $userRegistration);
            return view('Report.userreport',compact('userRegistration'));
    }

    public function paymentReport()
    {
        $deposit = deposit::get();
        // dd($deposit);
        return view('Report.paymentreport',compact('deposit'));

    }
}
