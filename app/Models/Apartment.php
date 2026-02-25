<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Apartment extends Model
{
    //

    protected $fillable = [
        'name',
        'status',

    ];
    
    public function users()
    {
        return $this->belongsToMany(User::class)
        ->withPivot('role', 'status', 'joined_at', 'left_at')
        ->withTimestamps();
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
