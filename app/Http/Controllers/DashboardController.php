<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
    }
    public function generate(){
        $orders = Orders::orderBy('created_at', 'DESC')->where('status', 'delivered')->get()->take(10);
        $totalRevenue = Orders::where('status', 'delivered')->sum('total');
        $pdf = \PDF::loadView('admin.reports.delivered-report', compact('orders', 'totalRevenue'))->setOptions(['defaultFont' => 'sans-serif']);

            //dd($pdf);
        return $pdf->download("bella's Delights Orders Report.pdf");
        //return view('admin.reports.delivered-report', compact('orders','totalRevenue'));
        //$layout = View::make('livewire.admin-dashboard', $data);

        /* Create PDF */
        // $pdf = \App::make('dompdf.wrapper');
        // $pdf->loadHTML($layout->render());
        // return $pdf->stream();
    }
}
