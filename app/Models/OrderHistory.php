<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderHistory extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $append = ['HumanDate'];

    public function getHistoryCodeAttribute($key)
    {
        return json_decode($key);
    }
    public function ItemCont(){
        return count($this->history_code);
    }
    public function getHumanDateAttribute(){
        return Carbon::parse($this->created_at)->diffForHumans();
    }
    // public function Product(){
    //     return $this->belongsTo(Product::class , 'product_code' , 'product_code');
    // }
}
