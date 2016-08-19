<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model{
    
    protected $table = 'carts';

 	//=====================================
	//method delete from cart
	//=====================================
	public function delMyCart($id){

		return $this->where('id', $id)->delete();
	}

 	//=====================================
	//method delete canvas in cart where id canvas
	//=====================================
	public function deleteCnvCart($id){

		return $this->where('id_cnv', $id)->delete();
	}

 	//=====================================
	//method add canvas in cart
	//=====================================
	public function addCnvCart($data){

		return $this->insert(['id_user'=>$data['id_user'], 'id_cnv' => $data['id_cnv']]);
	}

 	//=====================================
	//method get all user canvas of cart
	//=====================================
	public function getAllCnvCart($id){

		return $this->select('cnv.*', 'size_prices.price', 'cnv.id as id_cnv', 'carts.id as id')->where('carts.id_user', $id)->join('cnv', 'cnv.id', '=', 'carts.id_cnv')->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')->get();
	}
 	//=====================================
	//method get all cart
	//=====================================
	public function getAllCarts(){

		return $this->select('cnv.*', 'users.name as user_name', 'size_prices.price', 'cnv.id as id_cnv', 'carts.id as id')->join('users', 'carts.id_user', '=', 'users.id')->join('cnv', 'cnv.id', '=', 'carts.id_cnv')->join('size_prices', 'cnv.id_pr_size', '=', 'size_prices.id')->paginate(6);
	}

}
