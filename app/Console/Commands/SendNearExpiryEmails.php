<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\NearExpireNotificationMail; // ✅ Yehi sahi hai

class SendNearExpiryEmails extends Command
{
    protected $signature = 'notify:near-expiry';
    protected $description = 'Send email to admin about subscriptions near expiry';

    public function handle()
    {
        $adminEmail = 'ahsanmughal12432@gmail.com'; // ✅ Apna admin email yahan likho

        $expiringUsers = DB::table('subscriptions')
            ->join('packages', 'subscriptions.package_id', '=', 'packages.id')
            ->join('users', 'subscriptions.user_id', '=', 'users.id')
            ->select(
                'users.name',
                'users.email',
                DB::raw("DATEDIFF(DATE_ADD(subscriptions.created_at, INTERVAL packages.duration_days DAY), CURDATE()) as days_left")
            )
            ->where('subscriptions.payment_status', 'approved')
            ->having('days_left', '=', 2)
            ->get();

        if ($expiringUsers->count() > 0) {
            // ✅ Ye line galat thi, ab sahi hai
            Mail::to($adminEmail)->send(new NearExpireNotificationMail($expiringUsers));
            $this->info('Near expiry email sent to admin.');
        } else {
            $this->info('No near expiry subscriptions found today.');
        }
    }
}
