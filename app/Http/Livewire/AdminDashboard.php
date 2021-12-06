<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;

class AdminDashboard extends Component
{
    public $pdf;


    public function render()
    {
        // $orders = Orders::orderBy('created_at', 'DESC')->where('status', 'delivered')->get()->take(10);
        $orders = DB::table('users')
        ->join('orders', 'users.id', '=', 'orders.user_id')
        ->orderBy('orders.created_at', 'DESC')
        ->select('orders.*','orders.id AS order_id', 'users.*')
        ->where('status', 'delivered')
        ->get()->take(10);
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

        return view('livewire.admin-dashboard',[
            'orders' => $orders,
            'totalSales' => $totalSales,
            'totalRevenue' => $totalRevenue,
            'todayRevenue' => $todayRevenue,
            'todaySales' => $todaySales,
            'ordersCount' => $ordersCount,
            'revenue' => $revenue,
        ]);
    }

}
