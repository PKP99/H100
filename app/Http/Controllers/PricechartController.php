<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pricechart;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;

class PricechartController extends Controller
{
    public function create(Request $req){

          $data= new pricechart;

          $data->ex_id= $req->ex_id;
          $data->title= $req->title;
          $data->description= $req->description;
          $data->rate= $req->rate;
          
          $data->save();

           return response([
              'message'=>["Data created succesfully"]
          ]);     
      }

    public function index(Request $req)
    {
        $exid = $req->exid;
        $data = pricechart::where('ex_id',$exid)->get();
    
        return $data;
    }
    
    public function show($id){
        $data =pricechart::where('id',$id)->first();

        if(!$data){
           return response([
               'error'=>["Data not found!"]
           ]);
        }
        else return $data;
      }
      public function update(Request $req){

          $data= pricechart::find($id);
          
          $data->ex_id= $req->ex_id;
          $data->title= $req->title;
          $data->description= $req->description;
          $data->rate= $req->rate;
          
          $data->save();

          return response([
              'message'=>["Data has been updated succesfully"]
          ]);     
        }
      public function destroy($id){
        $data = pricechart::findOrFail($id);
        $data->delete();

        return response([
              'message'=>["Data has been deleted"]
          ]);    
     }
}
