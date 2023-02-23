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

    public function store(Request $request)
    {
        $students =    [
            'FirstName' => $request->FirstName,
            'LastName' => $request->LastName,
            'MiddleName' => $request->MiddleName,
            'Gender' => $request->Gender,
        ];
        if(empty($request->FirstName)){
            return view('Student')->with('Error', 'FirstName is required.');
        }
        if(empty($request->LastName)){
            return view('Student')->with('Error', 'LastName is required.');
        }
        $Filter = Student::where('FirstName',$request->FirstName)
        ->where('LastName',$request->LastName)
        ->where('MiddleName',$request->MiddleName)
        ->where('Gender',$request->Gender)->first();
        if($Filter){
            return view('Student')->with('Error', 'Student info already exist.');
        } else {
            $save = Student::insert($students);
            if($save){
                return view('Student')->with('Success', 'Successfully save');
            } else {
                return view('Student')->with('Error', 'Invalid');
            }
        }
    }

    public function data(){
        $data = Student::all();
        return view('StudentData',compact('data'));
    }
}
