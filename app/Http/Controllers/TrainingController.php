<?php

namespace App\Http\Controllers;
use App\Models\Training;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;

class TrainingController extends Controller
{
    public function create(Request $req){

          $train= new Training;

          $train->title= $req->title;
          $train->type= $req->type;
          $train->content= $req->content;
          $train->content_type= $req->content_type;
          
          $train->save();

           return response([
              'message'=>["Data created succesfully"]
          ]);     
      }

    public function index()
    {
        $data = Training::all();
    
        return $data;
    }
    
    public function show($id){
        $data =Training::where('id',$id)->first();

        if(!$data){
           return response([
               'error'=>["Data not found!"]
           ]);
        }
        else return $data;
      }
      public function update(Request $req){

          $train= Training::find($id);
          
          $train->title= $req->title;
          $train->type= $req->type;
          $train->content= $req->content;
          $train->content_type= $req->content_type;
          
          $train->save();

          return response([
              'message'=>["Data has been updated succesfully"]
          ]);     
        }
      public function destroy($id){
        $data = Training::findOrFail($id);
        $data->delete();

        return response([
              'message'=>["Data has been deleted"]
          ]);    
     }
}
