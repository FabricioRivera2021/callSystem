<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Numeros extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero', 'estados_id', 'filas_id', 'customer_id'
    ];

    public function filas(): BelongsTo
    {
        return $this->belongsTo(Filas::class);
    }

    public function estados(): BelongsTo
    {
        return $this->belongsTo(Estados::class);
    }

    public function customers(): HasMany
    {
        return $this->hasMany(Customers::class);
    }

    // public function numeros():BelongsTo
    // {
    //     return $this->belongsTo(User::class);
    // }
}
