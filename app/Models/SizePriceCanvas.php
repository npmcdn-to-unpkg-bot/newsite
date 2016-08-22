<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SizePriceCanvas extends Model{
	
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

    //=====================================
	//method add to price_size
	//=====================================
	public function addPrSize($data){

		return $this->insert(['title'=>$data['title'], 'size' => $data['size'], 'price'=>$data['price'], 'size_w'=>$data['width'], 'size_h'=>$data['height']]);
	}

    //=====================================
	//method update to price_size
	//=====================================
	public function upPrSize($data){

		return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'size' => $data['size'], 'price'=>$data['price'], 'size_w'=>$data['width'], 'size_h'=>$data['height']]);
	}

    //=====================================
	//method del to price_size
	//=====================================
	public function delPrSize($id){

		return $this->where('id', $id)->delete();
	}
}
