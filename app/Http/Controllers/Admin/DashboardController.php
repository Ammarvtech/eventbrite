<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard.index');
    }
    public function forgetPassword()
    {
        return view('admin.auth.forget_password');
    }
    public function verifyCode()
    {
        return view('admin.auth.verify_code');
    }
     public function updatePassword()
    {
        return view('admin.auth.change_password');
    }
}
