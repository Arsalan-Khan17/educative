<?php

namespace App\Http\Controllers;

use App\Models\GroupStudent;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Session;
use App\Models\Subject;
use PHPUnit\Exception;

class CommonController extends Controller
{
    public function index(){
        $name = Route::currentRouteName();

        $table = get_table($name);
        $data['lists'] = $table::where('status',1)->get();
        $data['name'] = $name;
        return view('Common.list',$data);
    }

    public function save(Request $request){


        try{
        $name = $request->name;

        $table = get_table($name);
        $table->title = $request->title;

        $table->save();
        $response['status'] = 'Success';
        $response['result'] = 'Added Successfully';
    } catch (Exception $e){
        $response['status']= 'failure';
        $response['result'] = $e->getMessage();
        }
            return response()->json($response);
    }
    public function group_detail($id){
        $data['group'] = GroupStudent::with('students','groups')->where('group_id',$id)->get()[0];
        return view('common.group_detail',$data);
    }

}
