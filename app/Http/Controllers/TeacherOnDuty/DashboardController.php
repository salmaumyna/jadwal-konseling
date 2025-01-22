<?php

namespace App\Http\Controllers\TeacherOnDuty;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('teacher-onduty.dashboard', compact('user'));
    }
}
