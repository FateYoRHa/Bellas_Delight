<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
    }
}
