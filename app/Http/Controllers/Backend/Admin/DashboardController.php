<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data['active_admins'] = Admin::active()->verified()->count();
        $data['active_users'] = User::active()->verified()->count();
        return view('backend.admin.dashboard', $data);
    }
}
