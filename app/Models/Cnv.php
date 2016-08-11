<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cnv extends Model{

	protected $table = 'cnv';

	//=====================================
	//method return all canvas object JSON
	//=====================================
	public function getAllCnv(){

		return $this->orderBy('id', 'desc')->paginate(6);
	}

 	//=====================================
	//method return one canvas object JSON of id user
	//=====================================
	public function getOneCnv($id_cnv){

		return $this->where('id', $id_cnv)->get();
	}  

 	//=====================================
	//method return all user canvas object JSON
	//=====================================
	public function getAllUserCnv($id_user){

		return $this->where('id_user', $id_user)->orderBy('id', 'desc')->paginate(6);
	}
 
 	//=====================================
	//method return one canvas object JSON of id user
	//=====================================
	public function getOneUserCnv($id_cnv, $id_user){

		return $this->where('id', $id_cnv)->where('id_user', $id_user)->get();
	}  

 	//=====================================
	//method add canvas object JSON
	//=====================================
	public function addCnv($data){

		return $this->insert(['name'=>$data['name_cnv'], 'json_data'=>$data['jsn_cnv'], 'id_user'=>$data['id_user']]);
	}

 	//=====================================
	//method add to my canvas object JSON
	//=====================================
	public function addMyCnv($id, $id_user){

		$cnv = $this->where('id', $id)->first()->toArray();
		
		return $this->insert(['name'=>$cnv['name'], 'json_data'=>$cnv['json_data'], 'id_user' => $id_user]);
	}

 	//=====================================
	//method update canvas object JSON
	//=====================================
	public function upCnv($data){

		return $this->where('id', $data['id_cnv'])->update(['name'=>$data['name_cnv'], 'json_data'=>$data['jsn_cnv'], 'id_user'=>$data['id_user']]);
	}

 	//=====================================
	//method delete canvas object JSON
	//=====================================
	public function delCnv($id){

		$this->where('id', $id)->delete();
	}

}
