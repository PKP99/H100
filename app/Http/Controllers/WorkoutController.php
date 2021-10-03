<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Workout;

class WorkoutController extends Controller
{
    function create(Request $req){
          $Workout = new Workout;
          
          $Workout->name = $req->input('name');
          $Workout->frequency = $req->input('frequency');
          $Workout->index = $req->input('index');

          $Workout->save();

          return response([
              'message' => ["Workout Saved Succesfully"]
            ]);

    }
    public function read(){
          $workout = Workout::all();
          
          return $workout;
      }
      public function show($id){
        $workout =Workout::where('id',$id)->first();

        if(!$workout){
           return response([
               'error'=>["Workout not found!"]
           ]);
        }
        else return $workout;
      }
      public function update(Request $req){

          $workout= Workout::find($id);
          $workout->name = $req->input('name');
          $workout->frequency = $req->input('frequency');
          $workout->index = $req->input('index');
          
          $workout->save();

          return response([
              'message'=>["Workout has been updated"]
          ]);     
        }
      public function destroy($id){
        $workout = Workout::findOrFail($id);
        $workout->delete();

        return response([
              'message'=>["Workout has been deleted"]
          ]);    
     }
}
