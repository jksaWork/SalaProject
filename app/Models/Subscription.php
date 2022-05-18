<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $append = ['EndDateHum' , 'StratDateHum'];

    public function getEndDateHumAttribute($key)
    {
        return Carbon::parse($this->end_date)->diffForHumans();
    }

    public function getStratDateHumAttribute($key)
    {
        return Carbon::parse($this->start_date)->diffForHumans();
    }

    public function Client(){
        return $this->belongsTo(Client::class, 'client_id');
    }
}
