<?php

namespace App\Http\Controllers\Backend\User;

use App\Http\Controllers\Controller;
use App\Models\BookIssues;
use App\Models\Magazine;
use App\Models\Newspaper;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $data = [];
        return view('backend.user.dashboard', $data);
    }
}
