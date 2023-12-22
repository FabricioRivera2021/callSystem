<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Numeros extends Model
{
    use HasFactory;

    public function filas(): HasMany
    {
        return $this->hasMany(Filas::class);
    }

    public function estados(): HasMany
    {
        return $this->hasMany(Estados::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customers::class);
    }

//     public function numeros():BelongsTo
//     {
//         return $this->belongsTo(User::class);
//     }
}
