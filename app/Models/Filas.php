<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filas extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado'
    ];

    public function numero():HasMany
    {
        return $this->hasMany(Numeros::class);
    }
}
