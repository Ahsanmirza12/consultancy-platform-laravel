<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
 

  
    
    public function index()
    {
        $earnings = DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->select(
                'packages.duration_days',
                DB::raw('SUM(packages.price) AS total_earnings'),
                DB::raw("CASE 
                            WHEN packages.duration_days = 30 THEN 'Monthly'
                            WHEN packages.duration_days = 120 THEN '4 months'
                            WHEN packages.duration_days = 180 THEN 'Six Months'
                            WHEN packages.duration_days = 365 THEN 'Yearly'
                            ELSE 'Other'
                         END AS duration_type")
            )
            ->where('subscriptions.payment_status', 'approved')
            ->groupBy('packages.duration_days')
            ->get();
    
        $total = $earnings->sum('total_earnings');
    
        $activeSubscriptionsCount = DB::table('subscriptions')->where('payment_status', 'approved')->count();
        $pendingSubscriptionsCount = DB::table('subscriptions')->where('payment_status', 'pending')->count();
    
        // Fetch users with subscriptions near to expiry (within 10 days)
        $nearToExpireUsers = DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->join('users', 'subscriptions.user_id', '=', 'users.id')
            ->select(
                'users.first_name',
                'subscriptions.created_at',
                'packages.duration_days',
                DB::raw("DATEDIFF(DATE_ADD(subscriptions.created_at, INTERVAL packages.duration_days DAY), CURDATE()) as days_left")
            )
            ->where('subscriptions.payment_status', 'approved')
            ->having('days_left', '<=', 10)
            ->having('days_left', '>', 0)
            ->orderBy('days_left', 'asc')
            ->get();
    
        // ✅ Calculate percentage of near-to-expiry subscriptions
        $totalApproved = $activeSubscriptionsCount;
        $nearToExpireCount = $nearToExpireUsers->count();
        $percentageNearExpiry = $totalApproved > 0 ? round(($nearToExpireCount / $totalApproved) * 100) : 0;
    
        return view('index', compact(
            'earnings',
            'total',
            'activeSubscriptionsCount',
            'pendingSubscriptionsCount',
            'nearToExpireUsers',
            'percentageNearExpiry' // ✅ pass this to view
        ));
    }
    
}
