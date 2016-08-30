<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hanger extends Model{

	protected $table = 'hangers';

    //=====================================
	//method get materials 
	//=====================================
	public function getHan(){

		return $this->get();
	}

    //=====================================
	//method add hanger
	//=====================================
	public function addHan($data){

		return $this->insert(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);
	}

    //=====================================
	//method del hanger
	//=====================================
	public function upHan($data){

		if (!empty($data['image'])){

        	return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);

		}else{

			return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price']]);
		}
		
	}

    //=====================================
	//method del hanger
	//=====================================
	public function delHan($data){

		return $this->where('id', $data['id'])->delete();
	}

}
