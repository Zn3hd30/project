<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function show()
    {
        return view('Student');
    }


    public function add_student()
    {
        return view('add_student');
    }

    public function list_student()
    {
        $Student = Student::all();
        return view('list_student' ,compact('Student'));
    }

    public function store(Request $request)
    {
        $students =    [
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'MiddleName' => $request->MiddleName,
            'ExtensionName' => $request->ExtensionName,
            'BirthDate' => $request->BirthDate,
            'Gender' => $request->Gender,
        ];

        if(empty($request->FirstName)){
            return view('add_student')->with('Error', 'FirstName is required.');
        } 
        if(empty($request->LastName)){
            return view('add_student')->with('Error', 'LastName is required.');
        }
        $Filter = Student::where('FirstName',$request->FirstName)
        ->where('LastName',$request->LastName)
        ->where('MiddleName',$request->MiddleName)
        ->where('Gender',$request->Gender)->first();
        if($Filter){
            return view('add_student')->with('Error', 'Student info already exist.');
        } else {
            $save = Student::insert($students);
            if($save){
                return view('add_student')->with('Success', 'Successfully save');
            } else {
                return view('add_student')->with('Error', 'Invalid');
            }
        }
    }

    public function data(){
        $data = Student::all();
        return view('StudentData',compact('data'));
    }
}
