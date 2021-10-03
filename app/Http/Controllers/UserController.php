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

        $storeData = $req->validate([
            'email' => 'required|max:200',
            'password' => 'required|max:100',
        ]);

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
