<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;

    protected $table = "employees";

    // protected $fillable = ['name','email','mobile'];
    protected $guarded =[];

    public function register($array){
        return self::create($array);
    }

    public function getValues($id=null){
        $query = self::select('id','name','email','mobile');
        if($id==null){
            $data =  $query->get();
        }else{
            $data =  $query->where('id',$id)->get();
        }

        return $data;
    }

    public function updateValues($id,$array){
        return self::where('id',$id)->update($array);
    }

    public function deleteValues($id){
        return self::where('id',$id)->delete();
    }
}
