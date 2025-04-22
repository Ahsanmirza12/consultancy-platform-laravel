<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\UserPackage;
use App\Notifications\PackageExpiringSoon;
use App\Notifications\PackageExpired;

class CheckPackageExpiry extends Command
{
    protected $signature = 'packages:check-expiry';
    protected $description = 'Check package expiry and notify users';

    public function handle()
    {
        return 1;
        $soon = UserPackage::whereDate('end_date', now()->addDays(3))
            ->where('payment_status', 'approved')->get();

        foreach ($soon as $pkg) {
            $pkg->user->notify(new PackageExpiringSoon($pkg->package->name, $pkg->end_date));
        }

        $expired = UserPackage::whereDate('end_date', now())
            ->where('payment_status', 'approved')->get();

        foreach ($expired as $pkg) {
            $pkg->user->notify(new PackageExpired($pkg->package->name));
        }

        $this->info('Package expiry check completed!');
    }
}
