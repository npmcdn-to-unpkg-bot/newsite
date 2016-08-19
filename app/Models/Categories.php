<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model{
    
    protected $table = 'categories';

    //=====================================
	//method add to categories
	//=====================================
    public function getAllCat(){
    	
    	return $this->get();
    }

    //=====================================
	//method add to categories
	//=====================================
	public function addCat($data){

		return $this->insert(['title'=>$data['title'], 'image'=>$data['image']]);
	}

    //=====================================
	//method delete categories
	//=====================================
	public function delCat($data){

		return $this->where('id', $data['id'])->delete();
	}

    //=====================================
	//method add to categories
	//=====================================
	public function upCat($data){

		if (!empty($data['image'])) 
			return $this->where('id', $data['id'])->update(['title'=>$data['title'], 'image'=>$data['image']]);
		else
			return $this->where('id', $data['id'])->update(['title'=>$data['title']]);

	}
}
