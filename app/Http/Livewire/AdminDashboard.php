<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Orders;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminDashboard extends Component
{
    public function render()
    {
        $orders = Orders::orderBy('created_at', 'DESC')->get()->take(10);
        $totalSales = Orders::where('status', 'delivered')->count();
        $todaySales = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->count();

        // $today_date = Orders::whereDate('created_at', Carbon::today());
        $today_date = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->count();
        $month1 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(1))->count();
        $month2 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(2))->count();
        $month3 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(3))->count();
        $ordersCount = array($today_date,$month1,$month2,$month3);

        //REVENUE
        $totalRevenue = Orders::where('status', 'delivered')->sum('total');
        $todayRevenue = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->sum('total');
        $totalRevenue1 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(1))->sum('total');
        $totalRevenue2 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(2))->sum('total');
        $totalRevenue3 = Orders::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->subMonth(3))->sum('total');
        $revenue = array($todayRevenue,$totalRevenue1,$totalRevenue2,$totalRevenue3);

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
