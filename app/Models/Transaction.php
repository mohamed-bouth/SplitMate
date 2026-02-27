<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Expense;

class Transaction extends Model
{
    protected $fillable = [
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function creditor()
    {
        return $this->belongsTo(User::class , 'creditor_id');
    }

    public function debtor()
    {
        return $this->belongsTo(User::class , 'debtor_id');
    }

    public function apartment()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }
}
