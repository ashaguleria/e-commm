<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tableone extends Model
{
    use HasFactory;
    public function roles()
    {
        return $this->belongsToMany(tabletwo::class, 'tablethree');
    }

}