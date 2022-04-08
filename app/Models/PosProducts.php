<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PosProducts extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function getNameAttribute($key)
    {
        return json_decode($key);
    }
}
