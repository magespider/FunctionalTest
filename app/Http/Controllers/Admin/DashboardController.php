<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;  
use Illuminate\Http\Request;  

class DashboardController extends Controller
{ 
    /**
     * Display admin dashboard
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {   
        return view('admin.dashboard');
    } 
}
