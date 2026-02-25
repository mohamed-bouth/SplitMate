<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Apartment;
use App\Models\Expense;

class Transaction extends Model
{
    //

    public function users()
    {
        return $this->belongsTo(User::class);
    }

    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
    }

    public function expenses()
    {
        return $this->belongsTo(Expense::class);
    }
}
