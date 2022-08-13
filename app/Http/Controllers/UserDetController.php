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

         return $userd;
    }

    public function read(){
        $userd = UserDet::all();
        
        return $userd;
    }

    public function profile($id){
      $userd = UserDet::where('ex_id', $id)->first();

      $BMIop = $userd->weight / pow($userd->height/100, 2);
      $userd->BMI = number_format($BMIop, 2);
      if($userd->BMI < 18.5){
      $userd->weightcat = "Underweight";
      }
      elseif($userd->BMI >= 18.5 && $userd->BMI <= 24.9)
      {
        $userd->weightcat = "Normal Weight";
      }
      elseif($userd->BMI >= 25 && $userd->BMI <= 29.9)
      {
        $userd->weightcat = "Overweight";
      }
      elseif($userd->BMI >= 30)
      {
        $userd->weightcat = "Obese";
      }
      
      $s = null;
      if($userd->gender == 'Male'){ $s = 5;}
      else if($userd->gender == 'Female'){ $s = (-161);}
      $today = date("Y-m-d");
      $diff = date_diff(date_create($userd->DOB), date_create($today));
      $userd->age = $diff->format('%y');
      $userd->BMR = (10 * $userd->weight) + (6.25 * $userd->height) - (5 * $userd->age) +$s;

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

        return $userd;   
      }
    public function destroy($id){
      $userd = UserDet::findOrFail($id);
      $userd->delete();

      return response([
            'message'=>["userd has been deleted"]
        ]);    
   }
}
