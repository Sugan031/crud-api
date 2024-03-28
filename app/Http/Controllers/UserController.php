<?php

namespace App\Http\Controllers;

use App\Models\user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\FuncCall;

class UserController extends Controller
{
    private $user;
    public function __construct(user $user) {
        $this->user = $user;
      }
        public function create(Request $request){
            $data = json_decode($request->getContent());
            $array = json_decode(json_encode($data),true);
            $array['password'] = Hash::make($array['password']);


            $result = $this->user->register($array);
            if($result){
                $value = ['status' => 1, 'message' => "Record successfully created"];
            }else{
                $value = ['status' => 0, 'message' => "Failed to create record."];
            }

            return response()->json($value);
        }

        public function index($id = null){
            $users = $this->user->getValues($id);

            return response()->json($users);
        }

        public function login(Request $request){
           
            $users = $this->user->login($request->email);
            // print_r($users->password);
            // exit();
            if($users && Hash::check($request->password,$users->password)){
                $value = ['status' => 1, 'message' => "Record successfully created"];
            }
            else{
                $value = ['status' => 0, 'message' => "Failed to create record."];
            }
            return response()->json($value);
        }

        public function update(Request $request, $id){
            $data = json_decode($request->getContent());
            $array = json_decode(json_encode($data),true);
            $array['password'] = Hash::make($array['password']);

            $result = $this->user->updateValues($id,$array);
            if($result){
                $value = ['status' => 1, 'message' => "Record successfully updated"];
            }else{
                $value = ['status' => 0, 'message' => "Failed to update record."];
            }

            return response()->json($value);
        }

        public function delete($id){
          $result =  $this->user->deleteValues($id);
        if($result){
            $value = ['status' => 1, 'message' => "Record successfully deleted"];
        }else{
            $value = ['status' => 0, 'message' => "Failed to delete record."];
        }

        return response()->json($value);
        }

}
