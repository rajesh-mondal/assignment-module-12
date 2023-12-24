<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatAllocation;
use Carbon\Carbon;

class SalesController extends Controller
{

    public function index() {
        $todaySales = SeatAllocation::whereDate('created_at', today())->sum('price');
        $yesterdaySales = SeatAllocation::whereDate('created_at', today()->subDay())->sum('price');
        $thisMonthSales = SeatAllocation::whereMonth('created_at', today())->sum('price');
        $lastMonthSales = SeatAllocation::whereMonth('created_at', today()->subMonth())->sum('price');

        return view('dashboard.index', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }

    private function getSalesForDate($date)
    {
        return SeatAllocation::whereDate('created_at', $date)->sum('price');
    }

    private function getSalesForMonth($date)
    {
        return SeatAllocation::whereYear('created_at', $date->year)
            ->whereMonth('created_at', $date->month)
            ->sum('price');
    }
}
