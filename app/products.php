<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';
    public function product_type()
    {
    	return $this->belongTo('App\Models\type_products','id_type', 'id');
    }
    public function bill_detail()
    {
    	return $this->hasMany('App\Models\bill_detail','id_product', 'id');
    }
}
