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
        $totalRevenue = Orders::where('status', 'delivered')->sum('total');
        $todaySales = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->count();
        $todayRevenue = Orders::where('status', 'delivered')
        ->whereDate('created_at', Carbon::today())->sum('total');
        return view('livewire.admin-dashboard',[
            'orders' => $orders,
            'totalSales' => $totalSales,
            'totalRevenue' => $totalRevenue,
            'todaySales' => $todaySales,
            'todayRevenue' => $todayRevenue,
        ]);
    }
}
