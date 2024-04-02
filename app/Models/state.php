<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class state extends Model
{
    use HasFactory;

    protected $table = "states";
    public function country(){
        return $this->belongsTo(user::class);
    }

    public function findStates($country_id=null){
        $query= $this->select('name','country_id');
        if($country_id===null){
            $data = $query->get();
        } else{
          $data = $query->where('country_id',$country_id)->get();
        }
        return $data;
    }
}
