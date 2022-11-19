<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use PHPUnit\Exception;

class LectureController extends Controller
{
    public function index($class_id = null){

        $query= Lecture::where('status',1);
        if($class_id){
            $query = $query->where('class_id',$class_id);
            $data['class_id'] = $class_id;
        }
        $data['lectures'] = $query->orderby('added_on','desc')->get();
        return view('lectures.lectures',$data);
    }


    public function save_lecture(Request $request){

        try{
            $lecture = new Lecture();

            $lecture->title = $request->title;
            $lecture->url = $request->url;
            $lecture->class_id = $request->class_id;

            $lecture->save();
            $response['status'] = 'Success';
            $response['result'] = 'Added Successfully';
        } catch (Exception $e){
            $response['status']= 'failure';
            $response['result'] = $e->getMessage();
        }
        return response()->json($response);
    }

}
