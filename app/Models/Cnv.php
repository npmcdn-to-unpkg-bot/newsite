<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cnv extends Model{

	protected $table = 'cnv';

	//=====================================
	//method return all canvas object JSON
	//=====================================
	public function getAllGalleryCnv(){

		return $this
		->select('cnv.*', 'sp.size_h', 'sp.size_w', 
				'sp.price', 'sp.size',
				'sp.title', 'users.name as user_name', 
				'categories.title as cat_name', 
				'han.price as han_price',
				'han.title as han_title', 
				'mat.title as mat_title',
				'mat.price as mat_price')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('users', 'users.id', '=', 'cnv.id_user')
		->join('categories', 'categories.id', '=', 'cnv.id_cat')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->orderBy('id', 'desc')
		->where('cnv.public', 1)
		->paginate(6);
	}

	//=====================================
	//method return all canvas selected design
	//=====================================
	public function getAllSelectedCnv($size){

		return $this
		->select('cnv.*', 'sp.size_h', 'sp.size_w', 'sp.price', 'sp.size',
				'sp.title', 'users.name as user_name', 'categories.title as cat_name', 'mat.title as mat_title',
				'mat.price as mat_price')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('users', 'users.id', '=', 'cnv.id_user')
		->join('categories', 'categories.id', '=', 'cnv.id_cat')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->orderBy('id', 'desc')
		->where('cnv.public', 1)
		->where('cnv.id_pr_size', $size)
		->paginate(6);
	}

	//=====================================
	//method return all canvas object JSON
	//=====================================
	public function getAllCnv(){

		return $this->select('cnv.*', 'users.name as user_name', 'categories.title as cat_name',
							'mat.title as mat_title', 'mat.price as mat_price')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('users', 'users.id', '=', 'cnv.id_user')
		->join('categories', 'categories.id', '=', 'cnv.id_cat')
		->orderBy('id', 'desc')
		->where('cnv.public', 1)

		->paginate(6);
	}
	//=====================================
	//method return all canvas object JSON
	//=====================================
	public function getAllHomeCnv(){

		return $this
		->select('cnv.*', 'sp.size_h', 'sp.size_w', 'categories.image as cat_img',
				'users.name as user_name', 'categories.title as cat_name')
		->join('users', 'users.id', '=', 'cnv.id_user')
		->join('categories', 'categories.id', '=', 'cnv.id_cat')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->orderBy('id', 'desc')
		->where('cnv.public', 1)
		->where('cnv.main', 1)
		->get();
	}

 	//=====================================
	//method return one canvas object JSON of id user
	//=====================================
	public function getOneCnv($id_cnv){

		return $this
		->select('cnv.*', 'sp.size_h', 'sp.size_w', 'users.name as user_name')
		->join('users', 'users.id', '=', 'cnv.id_user')
		->join('categories', 'categories.id', '=', 'cnv.id_cat')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->where('cnv.id', $id_cnv)
		->get();
	}  

 	//=====================================
	//method return all user canvas object JSON
	//=====================================
	public function getAllUserCnv($id_user){

		return $this
		->select('cnv.*', 'sp.size_h', 'sp.size_w', 'sp.price', 
				'sp.size', 'sp.title',
				'han.price as han_price',
				'han.title as han_title',
				'mat.title as mat_title', 'mat.price as mat_price')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->where('id_user', $id_user)
		->orderBy('id', 'desc')
		->paginate(6);
	}
 
 	//=====================================
	//method return one canvas object JSON of id user
	//=====================================
	public function getOneUserCnv($id_cnv, $id_user){

		return $this
		->select('cnv.*', 'sp.*', 'sp.title as title_sp', 'cnv.id as id_cnv')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->where('cnv.id', $id_cnv)
		->where('cnv.id_user', $id_user)
		->get();
	}  

 	//=====================================
	//method return one canvas object JSON of id user
	//=====================================
	public function getOneQCnv($id_cnv){

		return $this
		->select('cnv.*', 'sp.*', 'sp.title as title_sp', 'cnv.id as id_cnv')
		->join('size_prices as sp', 'cnv.id_pr_size', '=', 'sp.id')
		->where('cnv.id', $id_cnv)
		->get();
	}  

 	//=====================================
	//method add canvas object JSON
	//=====================================
	public function addCnv($data){

		return $this
		->insert(['name'=>$data['name_cnv'], 'id_cat' => $data['id_cat'], 
				'json_data'=>$data['jsn_cnv'], 'id_user'=>$data['id_user'], 
				'public'=>$data['ch_public'], 'id_pr_size'=>$data['id_pr_size'], 
				'id_material'=>$data['id_mat'], 'id_hanger'=>$data['id_hanger']]);
	}

 	//=====================================
	//method add to my canvas object JSON
	//=====================================
	public function addMyCnv($id, $id_user){

		$cnv = $this
		->where('id', $id)
		->first()
		->toArray();
		
		return $this
		->insert(['name'=>$cnv['name'], 'json_data'=>$cnv['json_data'],
				'id_user' => $id_user, 'public'=>$cnv['public'],
				'id_pr_size' => $cnv['id_pr_size'], 
				'id_material'=>$cnv['id_material'], 'id_hanger'=>$cnv['id_hanger']]);
	}

 	//=====================================
	//method update canvas object JSON
	//=====================================
	public function upCnv($data){

		return $this
		->where('id', $data['id_cnv'])
		->update(['name'=>$data['name_cnv'], 'json_data'=>$data['jsn_cnv'],
				'id_user'=>$data['id_user'], 'public'=>$data['ch_public'],
				'id_cat'=>$data['id_cat'], 'id_pr_size' => $data['id_pr_size'], 
				'id_material'=>$data['id_mat'], 'id_hanger'=>$data['id_hanger']]);
	}

 	//=====================================
	//method update canvas main colum
	//=====================================
	public function upMain($data){

		return $this
		->where('id', $data['id'])
		->update(['main'=>$data['main']]);
	}

 	//=====================================
	//method delete canvas object JSON
	//=====================================
	public function delCnv($id){

		$this
		->where('id', $id)
		->delete();
	}


}
