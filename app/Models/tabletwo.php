<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tabletwo extends Model
{
    use HasFactory;
    public function tableone()
    {
        return $this->belongsToMany(tableone::class, 'tablethree');
    }
}