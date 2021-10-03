<?php

namespace App\Http\Controllers;
use App\Models\Nutritionist;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;


class NutritionistController extends Controller
{
    public function create(Request $req){

          $data= new Nutritionist;

          $data->designation= $req->designation;
          $data->photo= $req->photo;
          $data->experience= $req->experience;
          $data->Accountno= $req->Accountno;
          $data->ifsc_code= $req->ifsc_code;
          $data->bank_name= $req->bank_name;
          $data->ex_id= $req->ex_id;
          $data->type= $req->type;
          
          $data->save();

           return response([
              'message'=>["Data created succesfully"]
          ]);     
      }

    public function index()
    {
        $data = Nutritionist::all();
    
        return $data;
    }
    
    public function show($id){
        $data =Nutritionist::where('id',$id)->first();

        if(!$data){
           return response([
               'error'=>["Data not found!"]
           ]);
        }
        else return $data;
      }
      public function update(Request $req){

          $data= Nutritionist::find($id);
          
          $data->designation= $req->designation;
          $data->photo= $req->photo;
          $data->experience= $req->experience;
          $data->Accountno= $req->Accountno;
          $data->ifsc_code= $req->ifsc_code;
          $data->bank_name= $req->bank_name;
          $data->ex_id= $req->ex_id;
          $data->type= $req->type;
          
          $data->save();

          return response([
              'message'=>["Data has been updated succesfully"]
          ]);     
        }
      public function destroy($id){
        $data = Nutritionist::findOrFail($id);
        $data->delete();

        return response([
              'message'=>["Data has been deleted"]
          ]);    
     }
}
