<?php

namespace App\Models;

use DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class abc extends Model
{
    use HasFactory;
    public static function getusers()
    {

        $result = DB::table('abcs')
            ->select('*')
            ->get();
        return $result;
    }
}