<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model{

	protected $table = 'menus';

    //=====================================
	//method get materials 
	//=====================================
	public function getMenu(){

		return $this->get();
	}

    //=====================================
	//method add materials
	//=====================================
	public function addMenu($data){

		return $this->insert(['item'=>$data['item'], 'anchor' => $data['anchor']]);
	}

    //=====================================
	//method del materials
	//=====================================
	public function upMenu($data){

		return $this->where('id', $data['id'])->update(['item'=>$data['item'], 'anchor' => $data['anchor']]);
	}

    //=====================================
	//method del materials
	//=====================================
	public function delMenu($data){

		return $this->where('id', $data['id'])->delete();
	}
}
