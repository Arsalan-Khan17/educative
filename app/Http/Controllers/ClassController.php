<?php

namespace App\Http\Controllers;
use App\Models\ClassModal;
use App\Models\GroupStudent;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Group;
use App\Models\Session;
use App\Models\Subject;
use PHPUnit\Exception;
class ClassController extends Controller
{
    public function list(){

        $data['groups'] = Group::where('status',1)->get();
        $data['sessions'] = Session::where('status',1)->get();
        $data['subjects'] = Subject::where('status',1)->get();
        $data['teachers'] = User::where('status',1)->where('role_id',2)->get();
        $data['classes'] = ClassModal::where('teacher_id',Auth::user()->user_id)
            ->where('status',1)->with('session','user','group','subject')->get();
        return view('classes.list',$data);
    }

    public function save_class(Request $request){

        try{
        $class = new ClassModal();

        $class->group_id = $request->group;
        $class->session_id = $request->session_id;
        $class->subject_id = $request->subject;
        $class->teacher_id= $request->teacher;
        $class->save();
        $response['status'] = 'Success';
        $response['result'] = 'Added Successfully';
    } catch (Exception $e){
        $response['status']= 'failure';
        $response['result'] = $e->getMessage();
    }
        return response()->json($response);
        }
    }


