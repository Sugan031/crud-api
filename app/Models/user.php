<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use NunoMaduro\Collision\Adapters\Phpunit\State;

class user extends Model
{
    use HasFactory;

    protected $table = "countries";

    //  protected $fillable = ['name','email','mobile','password'];
    protected $guarded =[];
    public function states(){
        return $this->hasMany(state::class);
    }
    public function register($array){
        return self::create($array);
    }
    public function login($email){
        $data = self::where('email',$email)->first();
        return $data;
    }
    // public function getValues($id=null){
    //     $query = self::select('id','name','email','mobile');
    //     if($id==null){
    //         $data =  $query->get();
    //     }else{
    //         $data =  $query->where('id',$id)->get();
    //     }

    //     return $data;
    // }

    public function filterCountriesFromDb($id=null){
        return $this->select("id","name","iso2")->get();
    }

    public function updateValues($id,$array){
        return self::where('id',$id)->update($array);
    }

    public function deleteValues($id){
        return self::where('id',$id)->delete();
    }
}
