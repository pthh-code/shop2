<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    //use HasFactory;
    protected $table = 'bills';
    public function bill_detail()
    {
    	return $this->hasMany('App\Models\bill_detail','id_bill', 'id');
    }
    public function bill()
    {
    	return $this->belongTo('App\Models\customer','id_customer', 'id');
    }
}
