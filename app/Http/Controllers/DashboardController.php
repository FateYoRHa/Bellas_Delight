<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Orders;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //

    public function index()
    {
        return view('admin.dashboard');
    }
    public function generate(){
        $orders = Orders::orderBy('created_at', 'DESC')->where('status', 'delivered')->get()->take(10);
        $totalSales = Orders::where('status', 'delivered')->count();
        $todaySales = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->count();

        // $today_date = Orders::whereDate('created_at', Carbon::today());
        $today_date = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->where('status', 'delivered')->count();
        $month1 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(1))->where('status', 'delivered')->count();
        $month2 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(2))->where('status', 'delivered')->count();
        $month3 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(3))->where('status', 'delivered')->count();
        $ordersCount = array($today_date,$month1,$month2,$month3);

        //REVENUE
        $totalRevenue = Orders::where('status', 'delivered')->sum('total');
        $todayRevenue = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->sum('total');
        $totalRevenue0 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->where('status', 'delivered')->sum('total');
        $totalRevenue1 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(1))->where('status', 'delivered')->sum('total');
        $totalRevenue2 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(2))->where('status', 'delivered')->sum('total');
        $totalRevenue3 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(3))->where('status', 'delivered')->sum('total');
        $revenue = array($totalRevenue0,$totalRevenue1,$totalRevenue2,$totalRevenue3);
        //$pdf = app('dompdf.wrapper');
        $data = [
            'orders' => $orders,
            'totalSales' => $totalSales,
            'totalRevenue' => $totalRevenue,
            'todayRevenue' => $todayRevenue,
            'todaySales' => $todaySales,
            'ordersCount' => $ordersCount,
            'revenue' => $revenue];
        $pdf = \PDF::loadView('livewire/admin-dashboard', $data);
            //dd($pdf);
        return $pdf->download('reports.pdf');
        // $layout = View::make('livewire.admin-dashboard', $data);

        // /* Create PDF */
        // $pdf = App::make('dompdf.wrapper');
        // $pdf->loadHTML($layout->render());
        // return $pdf->stream();
    }
}
