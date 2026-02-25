<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Expense;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Apartment;


class Category extends Model
{
    //

    protected $fillable = [
        'name',

    ];

    public function expenses()
    {
        return $this->HasMany(Category::class);
    }

    public function apartments()
    {
        return $this->belongsTo(Apartment::class);
    }
}
