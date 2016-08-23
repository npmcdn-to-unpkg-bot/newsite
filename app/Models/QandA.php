<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QandA extends Model{

	protected $table = 'qa';

    //=====================================
	//method get subs 
	//=====================================
	public function getQA(){

		return $this->get();
	}

    //=====================================
	//method add qa
	//=====================================
	public function addQA($data){

		return $this->insert(['question'=>$data['q'], 'answer' => $data['a']]);
	}

    //=====================================
	//method del qa
	//=====================================
	public function upQA($data){

		return $this->where('id', $data['id'])->update(['question'=>$data['q'], 'answer' => $data['a']]);
	}

    //=====================================
	//method del qa
	//=====================================
	public function delQA($data){

		return $this->where('id', $data['id'])->delete();
	}

}
