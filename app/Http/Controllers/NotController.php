<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Route;

class NotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function create(Request $req){

          $notification= new Notification;

          $notification->title= $req->title;
          $notification->description= $req->description;
          $notification->external_link= $req->external_link;
          
          $notification->save();

           return response([
              'message'=>["Notification created succesfully"]
          ]);     
      }

    public function index()
    {
        $data = Notification::all();
    
        return $data;
    }
    
    public function show($id){
        $data =Notification::where('id',$id)->first();

        if(!$data){
           return response([
               'error'=>["Notification not found!"]
           ]);
        }
        else return $data;
      }
      public function update(Request $req){

          $notification= Notification::find($id);
          $notification->title= $req->title;
          $notification->description= $req->description;
          $notification->external_link= $req->external_link;
          
          $notification->save();

          return response([
              'message'=>["Notification has been updated"]
          ]);     
        }
      public function destroy($id){
        $data = Notification::findOrFail($id);
        $data->delete();

        return response([
              'message'=>["Notification has been deleted"]
          ]);    
     }
    
}
