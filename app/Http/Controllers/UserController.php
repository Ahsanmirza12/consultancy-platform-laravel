<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
   
    public function index()
    {
        $packages = Package::all();

        $earnings = DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->select(
                'packages.duration_days',
                DB::raw('SUM(packages.price) AS total_earnings'),
                DB::raw("CASE 
                            WHEN packages.duration_days = 30 THEN 'Monthly'
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

        $totalApproved = $activeSubscriptionsCount;
        $nearToExpireCount = $nearToExpireUsers->count();
        $percentageNearExpiry = $totalApproved > 0 ? round(($nearToExpireCount / $totalApproved) * 100) : 0;

        return view('consultancy.index', compact(
            'earnings',
            'total',
            'activeSubscriptionsCount',
            'pendingSubscriptionsCount',
            'nearToExpireUsers',
            'percentageNearExpiry',
            'packages'
        ));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('users.edit-users', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $id,
            'role' => 'required|in:user,admin',
        ]);

        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->email      = $request->email;
        $user->role       = $request->role;

        // Optional: Update password only if filled
        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|confirmed'
            ]);
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'User updated successfully!');
    }
}
