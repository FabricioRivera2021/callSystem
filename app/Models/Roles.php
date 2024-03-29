<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Roles extends Model
{
    use HasFactory;

    protected $fillable = [
        'roles'
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

}
