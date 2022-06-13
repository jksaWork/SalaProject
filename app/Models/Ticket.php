<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function Topic() : BelongsTo
    {
        return $this->BelongsTo(Topic::class);
    }
    public function Messages(){
        return $this->hasMany(TiketMessage::class);
    }

    public function getUpdatedAtAttribute($key)
    {
        return Carbon::parse($key)->diffForHumans();
    }
}
