<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $settings  = Setting::all();
        return view('admin.pengaturan', compact('settings'));
    }

    public function sohw()
    {
        return Setting::first();
    }
}
