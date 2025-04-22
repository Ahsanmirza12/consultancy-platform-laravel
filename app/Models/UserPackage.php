<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class UserPackage extends Model
{
    
    use HasFactory, Searchable;
   protected $table = "subscriptions";
    protected $fillable = ['user_id', 'package_id', 'payment_screenshot', 'payment_status', 'payment_method','start_date', 'end_date'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
    
}
