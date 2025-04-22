<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
class Package extends Model
{
    //
    use Searchable;
    protected $fillable = ['name', 'duration_days', 'price'];
    public function userPackages()
{
    return $this->hasMany(UserPackage::class);
}

}
