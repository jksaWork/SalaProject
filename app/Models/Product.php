<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $table = 'sala_products';
    protected $guarded = [];

    public function Pos(){
        $BotagateId =  PointOfSaleEqualSalaProduct::firstWhere('sala_product_id' , $this->product_id);
        return $BotagateId;
        // PosProducts::find($BotagateId);
    }
    public function Related(){
        return $this->hasOne(PointOfSaleEqualSalaProduct::class, 'sala_product_id' , 'product_id');
    }
}
