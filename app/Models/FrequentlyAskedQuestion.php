<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FrequentlyAskedQuestion extends Model
{
    use HasFactory;
    use HasFactory;
    protected $table = '_f_a_q';
    protected $guarded = [];
    protected $casts = [
        'status' => 'boolean',
    ];
    public function getNameAttribute($key)
    {

        return json_decode($key);
    }
}
