<?php
namespace App;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type_products extends Model
{
	//use HasFactory;
	protected $table = 'type_products';
	public function product()
	{
		return $this->hasMany('App\Models\products','id_type','id');
	}
    
}
