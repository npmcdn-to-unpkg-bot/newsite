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
	//method add canvas in cart
	//=====================================
	public function addCnvCart($data){

		return $this->insert(['id_user'=>$data['id_user'], 'id_cnv' => $data['id_cnv']]);
	}

 	//=====================================
	//method get all user canvas of cart
	//=====================================
	public function getAllCnvCart($id){

		return $this->select('cnv.*', 'cnv.id as id_cnv', 'carts.id as id')->where('carts.id_user', $id)->join('cnv', 'cnv.id', '=', 'carts.id_cnv')->get();
	}


}
