<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizePriceCanvas extends Model
{
    protected $table = 'size_prices';

    //=====================================
	//method select all price and size
	//=====================================
    public function getAllPriceSize(){
    	
    	return $this->orderBy('price')->get();
    }

    //=====================================
	//method select first price and size
	//=====================================
	public function getFirstPriceSize(){

		return $this->orderBy('id')->first();
	}
}
