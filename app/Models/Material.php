<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Material extends Model{

	protected $table = 'materials';

    //=====================================
	//method get materials 
	//=====================================
	public function getMat(){

		return $this->get();
	}

    //=====================================
	//method add materials
	//=====================================
	public function addMat($data){

		return $this->insert(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);
	}

    //=====================================
	//method del materials
	//=====================================
	public function upMat($data){

		if (!empty($data['image'])){

        	return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);

		}else{

			return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price']]);
		}
	}

    //=====================================
	//method del materials
	//=====================================
	public function delMat($data){

		return $this->where('id', $data['id'])->delete();
	}
}
