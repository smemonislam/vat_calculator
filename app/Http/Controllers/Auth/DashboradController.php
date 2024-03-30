<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboradController extends Controller
{
    public function index(){
        $user = User::find(Auth::user()->id);
        
        return view("admin.dashboard", compact("user"));
    }
}
