<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abc extends Model
{
    use HasFactory;
    public $table = "abcs";
    protected $fillable = ['name', 'email', 'phone', 'address'];

    public static function getusers()
    {
        $abc = DB::table('abcs')
            ->select('*')
        // ->whereBetween('created_at', [])
            ->get();
        return $abc;
    }
}