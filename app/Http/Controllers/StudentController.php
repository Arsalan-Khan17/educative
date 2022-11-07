<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{

    public function index()
    {

        $data['students'] = User::where('status',1)->with('group')->where('role_id',3)->get();

        return view('users.students',$data);
    }

    public function save(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'father_name' => 'required',
            'student_contact' => 'required',
            'guardian_contact' => 'required',
            'guardian_cnic' => ['required', 'regex:/^([0-9]{5})[\-]([0-9]{7})[\-]([0-9]{1})+/'],
            'student_cnic' =>  ['required', 'regex:/^([0-9]{5})[\-]([0-9]{7})[\-]([0-9]{1})+/'],
            'paid' => 'required',
            'balance' => 'required',
            'class' => 'required',
            'address' => 'required',
        ]);
        if ($validator->passes()) {

            $student = new User();
            $student->name = $request->name;
            $student->father_name = $request->father_name;
            $student->student_contact = $request->student_contact;
            $student->guardian_contact = $request->guardian_contact;
            $student->guardian_cnic = $request->guardian_cnic;
            $student->student_cnic = $request->student_cnic;
            $student->paid = $request->paid;
            $student->balance = $request->balance;
            $student->group_id = $request->class;
            $student->address = $request->address;
            $student->role_id = 3;
            $student->password = get_default_password();
            $student->email = $request->email.'@example.com';
            $student->save();

            $response['status'] = 'Success';
            $response['result'] = 'Added Successfully';
        } else{
            $response['status']= 'failure';
            $response['result'] = $validator->errors()->toJson();
        }
        return response()->json($response);
    }
}
