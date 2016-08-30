<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    
    protected $table = 'carts';

 	//=====================================
	//method delete from cart
	//=====================================
	public function delMyCart($id){

		return $this
		->where('id', $id)
		->delete();
	}

 	//=====================================
	//method delete canvas in cart where id canvas
	//=====================================
	public function deleteCnvCart($id){

		return $this
		->where('id_cnv', $id)
		->delete();
	}

 	//=====================================
	//method add canvas in cart
	//=====================================
	public function addCnvCart($data){

		return $this
		->insert(['id_user'=>$data['id_user'], 'id_cnv' => $data['id_cnv']]);
	}

 	//=====================================
	//method update canvas in cart as ordered
	//=====================================
	public function addOrdered($data){

		return $this
		->where('id_user', $data['id'])
		->update(['ordered' => 1]);
	}

 	//=====================================
	//method update canvas in cart as ordered
	//=====================================
	public function upDoneWait($id, $st){

		return $this
		->where('id', $id)
		->update(['status' => $st]);
	}

 	//=====================================
	//method get all user canvas of cart
	//=====================================
	public function getAllCnvCart($id){

		return $this
		->select('cnv.*', 'size_prices.*', 'cnv.id as id_cnv', 
				'carts.id as id', 'han.price as han_price',
				'han.title as han_title',
				'mat.title as mat_title', 'mat.price as mat_price')
		->where('carts.id_user', $id)
		->join('cnv', 'cnv.id', '=', 'carts.id_cnv')
		->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->where('ordered', false)
		->orderBy('carts.id', 'desc')
		->get();
	}

 	//=====================================
	//method get all user canvas of cart ordered
	//=====================================
	public function getAllCnvCartOrdered($id){

		return $this
		->select('cnv.*', 'size_prices.*', 'cnv.id as id_cnv',
				'carts.id as id', 'han.price as han_price',
				'han.title as han_title',
				'mat.title as mat_title', 'mat.price as mat_price')
		->where('carts.id_user', $id)
		->where('ordered', false)
		->join('cnv', 'cnv.id', '=', 'carts.id_cnv')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')
		->get();
	}

 	//=====================================
	//method get all cart
	//=====================================
	public function getAllCarts(){

		return $this
		->select('cnv.*', 'status', 'size_prices.*', 
				'users.name as user_name', 'han.price as han_price',
				'han.title as han_title',
				'cnv.id as id_cnv', 'carts.id as id', 
				'mat.title as mat_title', 'mat.price as mat_price')
		->join('users', 'carts.id_user', '=', 'users.id')
		->join('cnv', 'cnv.id', '=', 'carts.id_cnv')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')
		->paginate(6);
	}

 	//=====================================
	//method get all cart
	//=====================================
	public function getAllCartsOrdered(){

		return $this
		->select('cnv.*', 'status', 'size_prices.*', 
				'users.name as user_name', 'han.price as han_price',
				'han.title as han_title',
				'cnv.id as id_cnv', 'carts.id as id', 
				'mat.title as mat_title', 'mat.price as mat_price')
		->join('users', 'carts.id_user', '=', 'users.id')
		->join('cnv', 'cnv.id', '=', 'carts.id_cnv')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')
		->where('ordered', 1)
		->paginate(6);
	}
	

 	//=====================================
	//method get all cart status
	//=====================================
	public function getAllCartsStatus($user){

		return $this
		->select('cnv.*', 'status', 'size_prices.*', 
				'users.name as user_name', 'han.price as han_price',
				'han.title as han_title',
				'cnv.id as id_cnv', 'carts.id as id', 
				'mat.title as mat_title', 'mat.price as mat_price')
		->join('users', 'carts.id_user', '=', 'users.id')
		->join('cnv', 'cnv.id', '=', 'carts.id_cnv')
		->join('hangers as han', 'cnv.id_hanger', '=', 'han.id')
		->join('materials as mat', 'cnv.id_material', '=', 'mat.id')
		->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')
		->where('ordered', true)
		->where('users.id', $user)
		->paginate(6);
	}

//end class
}
