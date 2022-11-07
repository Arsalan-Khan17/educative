<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeacherController extends Controller
{
    public function index()
    {

        $data['teachers'] = User::where('status',1)->where('role_id',2)->get();
        return view('users.teachers',$data);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required'
        ]);
        if ($validator->passes()) {

            $teacher = new User();
            $teacher->name = $request->name;
            $teacher->email = $request->email.'@example.com';
            $teacher->role_id = 2;

            $teacher->password = get_default_password();
            $teacher->save();

            $response['status'] = 'Success';
            $response['result'] = 'Added Successfully';
        } else{
            $response['status']= 'failure';
            $response['result'] = $validator->errors()->toJson();
        }
        return response()->json($response);
    }
}
