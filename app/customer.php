<?php
namespace App;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
 use Illuminate\Database\Eloquent\Model;

class customer extends Model
{
    //use HasFactory;
    protected $table = 'customer';
    public function bill_detail()
    {
    	return $this->hasMany('App\Models\bills','id_customer', 'id');
    }
}
