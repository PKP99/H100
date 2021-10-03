<?php

namespace App\Http\Controllers;
use App\Models\Learn;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;


class LearnController extends Controller
{
    public function create(Request $req){

          $learn= new Learn;

          $learn->title= $req->title;
          $learn->description= $req->description;
          $learn->photo= $req->photo;
          $learn->external_link= $req->external_link;
          
          $learn->save();

           return response([
              'message'=>["Data created succesfully"]
          ]);     
      }

    public function index()
    {
        $data = Learn::all();
    
        return $data;
    }
    
    public function show($id){
        $data =Learn::where('id',$id)->first();

        if(!$data){
           return response([
               'error'=>["Data not found!"]
           ]);
        }
        else return $data;
      }
      public function update(Request $req){

          $learn= Learn::find($id);
          
          $learn->title= $req->title;
          $learn->description= $req->description;
          $learn->photo= $req->photo;
          $learn->external_link= $req->external_link;
          
          
          $learn->save();

          return response([
              'message'=>["Data has been updated succesfully"]
          ]);     
        }
      public function destroy($id){
        $data = Learn::findOrFail($id);
        $data->delete();

        return response([
              'message'=>["Data has been deleted"]
          ]);    
     }
}
