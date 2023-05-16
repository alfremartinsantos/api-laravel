<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customers;

class CustomerController extends Controller
{
    //
    public function get(){
        try{
            $data = Customers::get();
            return response()->json($data,200);
        }catch (\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function create(Request $request){
        try{
            $data['name'] = $request['name'];
            $data['lastname'] = $request['lastname'];
            $data['mail'] = $request['mail'];
            $data['phone'] = $request['phone'];
            $data['idstore'] = $request['idstore'];
            $res = Customers::create($data);
            return response()->json($res,200);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function getById($id){
        try{
            $data = Customers::find($id);
            return response()->json($data,200);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function update(Request $request,$id){
        try{
            $data['name'] = $request['name'];
            $data['lastname'] = $request['lastname'];
            $data['mail'] = $request['mail'];
            $data['phone'] = $request['phone'];
            $data['idstore'] = $request['idstore'];
            $res = Customers::find($id)->update($data);
            return response()->json($res,200);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
    public function delete($id){
        try{
            $res = Customers::find($id)->delete();
            return response()->json(['deleted' => $res],200);
        }catch(\Throwable $th){
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }
}
