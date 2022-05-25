<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use HasFactory , Notifiable;
    protected $guarded = [];
    protected $append = ['ExpiredDate2'];
    // public function setPosSecretAttribute($value)
    // {
    //     $this->attributes['pos_secret'] = encrypt($value); #([encrypt($value) , decrypt(encrypt($value))]);
    // }

    public function getPosSecretAttribute($key)
    {
        return decrypt($key);
    }

    public function getExpiredDate2Attribute($key)
    {
        return Carbon::createFromTimestamp($this->expired_date)->diffForHumans();
    }
}
