<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Component extends Model{

	protected $table = 'components';

    //=====================================
	//method get materials 
	//=====================================
	public function getComponents(){

		return $this->get();
	}

    //=====================================
	//method add materials
	//=====================================
	public function addComponents($data){

		return $this->insert(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);
	}

    //=====================================
	//method del materials
	//=====================================
	public function upComponents($data){

		if (!empty($data['image'])){

		    $image = $this->where('id', $data['id'])->select('image')->get()->toArray()[0];

        	$st = \File::delete('assets/images/'.$image['image']);

			return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price'], 'image'=>$data['image']]);

		}else{

			return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'price' => $data['price']]);
		}
	}

    //=====================================
	//method del materials
	//=====================================
	public function delComponents($data){

		$image = $this->where('id', $data['id'])->select('image')->get()->toArray()[0];

        $st = \File::delete('assets/images/'.$image['image']);

		return $this->where('id', $data['id'])->delete();
	}

}
