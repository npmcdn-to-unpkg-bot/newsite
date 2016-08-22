<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Social extends Model{

    protected $table = 'socials';

    //=====================================
	//method select logo
	//=====================================
    public function getSoc(){
    	
    	return $this->get();
    }

    //=====================================
	//method up logo
	//=====================================
    public function upSoc($data){
    	
    	return $this->where('id', $data['id'])->update(['href'=>$data['href']]);
    }
}
