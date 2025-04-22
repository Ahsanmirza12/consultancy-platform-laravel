<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserPackage;
use App\Notifications\PackageExpiringSoon;
use App\Notifications\PackageExpired;

class CheckSubscriptions extends Command
{
    protected $signature = 'subscriptions:check';
    protected $description = 'Check subscription expiry and send notifications';

    public function handle(): void
    {
        $subscriptions = UserPackage::where('payment_status', 'approved')->get();

        foreach ($subscriptions as $sub) {
            $user = $sub->user;
            $expiryDate = $sub->expiry_date;
            $daysLeft = now()->diffInDays($expiryDate, false);

            if ($daysLeft === 3) {
                $user->notify(new PackageExpiringSoon());
            }

            if ($expiryDate->isPast() && $sub->status !== 'expired') {
                $user->notify(new PackageExpired());
                $sub->update(['status' => 'expired']);
            }
        }
    }
}

