<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MasterSetting extends Controller
{
    public function setting()
    {
        return view('Master.setting');
    }
}
