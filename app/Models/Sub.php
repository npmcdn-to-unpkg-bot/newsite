<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sub extends Model{

	protected $table = 'subs';

    //=====================================
	//method add subs 
	//=====================================
	public function addSubs($data){

		return $this->insert(['email'=>$data['email'], 'name' => $data['name']]);
	}

    //=====================================
	//method get subs 
	//=====================================
	public function getSubs(){

		return $this->get();
	}

    //=====================================
	//method del subs 
	//=====================================
	public function delSubs($data){

		return $this->where('id', $data['id'])->delete();
	}

//end class
}
