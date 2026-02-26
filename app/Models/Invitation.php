<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Apartment;

class Invitation extends Model
{
    protected $fillable = [
        'token',
        'email',
        'created_by',
        'apartment_id',
        'status',
        
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'created_by');
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class , 'apartment_id');
    }
}
