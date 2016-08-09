<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cnv extends Model{

	protected $table = 'cnv';

	//=====================================
	//method return all canvas object JSON
	//=====================================
	public function getAllCnv(){

		return $this->paginate(4);
	}
 
 	//=====================================
	//method return one canvas object JSON
	//=====================================
	public function getOneCnv($id){

		return $this->where('id', $id)->get();
	}  

 	//=====================================
	//method return one canvas object JSON
	//=====================================
	public function addCnv($data){
		return $this->insert(['name'=>$data['name_cnv'], 'json_data'=>$data['jsn_cnv']]);
	}
}
