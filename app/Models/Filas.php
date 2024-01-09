<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Filas extends Model
{
    use HasFactory;

    public function customers():HasMany
    {
        return $this->HasMany(Customers::class);
    }
}
