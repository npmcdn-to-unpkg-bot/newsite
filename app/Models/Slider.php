<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model{

	protected $table = 'sliders';

	//=====================================
	//method return all image sliders
	//=====================================
	public function getAllSliders(){

		return $this->get();
	}

 	//=====================================
	//method delete from slider
	//=====================================
	public function delSlider($data){

        $image = $this->where('id', $data['id'])->select('images')->get()->toArray()[0];

        $st = \File::delete('assets/images/'.$image['images']);

		return $this->where('id', $data['id'])->delete();
	}

 	//=====================================
	//method add slider
	//=====================================
	public function addSlider($data){

		return $this->insert(['images' => $data['image']]);
	}

	//=====================================
	//method update to price_size
	//=====================================
	public function upSlider($data){

        $image = $this->where('id', $data['id'])->select('images')->get()->toArray()[0];

        $st = \File::delete('assets/images/'.$image['images']);
        
		return $this->where('id', $data['id'])->update(['images'=>$data['image']]);
	}
}
