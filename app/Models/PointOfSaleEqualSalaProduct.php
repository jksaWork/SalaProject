<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointOfSaleEqualSalaProduct extends Model
{
    use HasFactory;
    public $guarded = [];

    // public function Sala(){
    //     // return $this->belongsTo(Product::class,  'product_id', 'sala_product_id');
    //     // return $this->belongsTo(Product::class, 'product_id');
    // }
}
