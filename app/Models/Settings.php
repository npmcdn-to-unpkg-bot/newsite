<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Settings extends Model{

    protected $table = 'settings';

    //=====================================
	//method select logo
	//=====================================
    public function getLogo(){
    	
    	return $this->select('id', 'logo')->get();
    }

    //=====================================
	//method up logo
	//=====================================
    public function upLogo($data){
    	
    	return $this->where('id', $data['id'])->update(['logo'=>$data['image']]);
    }
}
