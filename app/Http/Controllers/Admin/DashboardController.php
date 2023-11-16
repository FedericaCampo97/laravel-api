<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Technology;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_project = Project::all()->count();
        $total_users = User::all()->count();
        $total_technologies = Technology::all()->count();
        return view('admin.dashboard', compact('total_project', 'total_users', 'total_technologies'));
    }
}
