<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pay extends Model
{
    use HasFactory;
    protected $table = 'pays';
    protected $fillable = [
        'card_number', 'card_expiry', 'price', 'user_id',
    ];
}