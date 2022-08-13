<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function register(Request $storeData){
        
        $user= new User;
        $user->name= $storeData->name;
        $user->password= Hash::make($storeData->password);
        $user->email= $storeData->email;
        $user->type= $storeData->type;

        $user->save();

        return $user;
    }

    function login(Request $req){

        $user =User::where('email',$req->email)->first();

       if(!$user){
                return response([
                    'error'=>["Email not found!"]
                ]);
        }
        else if(!Hash::check($req->password,$user->password)){
                return response([
                    'error'=>["Password not matched!"]
                ]);
        }
        else return $user;
    }
    function changepassword(Request $req){

        $user =User::where('email',$req->email)->first();

       if(!$user){
                return response([
                    'error'=>["Email not found!"]
                ]);
        }
        else{
            $user->password= Hash::make($req->password);
            $user->save();

            return $user;
        }
    }
    public function read(){
        
        $text = "User";
        $users = User::where('type', $text)->paginate(5);
        return $users;
    }
    public function updatepass(Request $req, $id){

          $user= User::find($id);

          $user->password= Hash::make($req->password);
          
          $food->save();

          return response([
              'message'=>["User has been updated"]
          ]);     
        }
    public function destroy($id){
        $food = User::findOrFail($id);
        $food->delete();

        return response([
              'message'=>["User has been deleted"]
          ]);    
     }
}
