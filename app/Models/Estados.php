<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Estados extends Model
{
    use HasFactory;

    protected $fillable = [
        'estado'
    ];

    public function numero():BelongsTo
    {
        return $this->belongsTo(Numeros::class);
    }
}
