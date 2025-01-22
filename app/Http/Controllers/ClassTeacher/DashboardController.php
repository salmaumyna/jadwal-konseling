<?php

namespace App\Http\Controllers\ClassTeacher;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        return view('class-teacher.dashboard', compact('user'));
    }
}
