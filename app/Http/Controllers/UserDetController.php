<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDet;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;

class UserDetController extends Controller
{
    public function create(Request $req){

        $userd= new UserDet;
        $userd->height= $req->height;
        $userd->weight= $req->weight;
        $userd->DOB= $req->DOB;
        $userd->ex_id= $req->ex_id;
        $userd->gender= $req->gender;

        $userd->save();

         return response([
            'message'=>["User details saved succesfully"]
        ]);     
    }

    public function read(){
        $userd = UserDet::all();
        
        return $userd;
    }

    public function show($id){
      $userd =UserDet::where('ex_id',$id)->first();

      if(!$userd){
         return response([
             'error'=>["user details not found!"]
         ]);
      }
      else return $userd;
    }
    public function update(Request $req, $id){

        $userd= UserDet::find($id);

        $userd->height= $req->height;
        $userd->weight= $req->weight;
        $userd->DOB= $req->DOB;
        $userd->ex_id= $req->ex_id;
        $userd->gender= $req->gender;
        
        $userd->save();

        return response([
            'message'=>["User Details has been updated"]
        ]);     
      }
    public function destroy($id){
      $userd = UserDet::findOrFail($id);
      $userd->delete();

      return response([
            'message'=>["userd has been deleted"]
        ]);    
   }
}
