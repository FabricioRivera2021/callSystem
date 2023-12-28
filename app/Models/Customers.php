<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'numeros_id', 'name', 'ci'
    ];

    public function numeros():BelongsTo
    {
        return $this->belongsTo(Numeros::class);
    }
}
