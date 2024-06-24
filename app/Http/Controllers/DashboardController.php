<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    //implement services
    public function toImplement()
    {
        $user = Auth::user();
        return view('to_implement', ['user' => $user]);
    }

    //project services

    public function project()
    {
        return view('project');
    }

    //emergency services

    public function emergency()
    {
        return view('emergency');
    }
}
