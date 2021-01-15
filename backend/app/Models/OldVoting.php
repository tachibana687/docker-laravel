<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OldVoting extends Model
{
    use HasFactory;

    public function creatures()
    {
        return $this->belongsTo(Creature::class);
    }
}
