<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'location_name',
        'address',
        'pincode',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
