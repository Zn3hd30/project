<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    //
    public function show()
    {
        $students = Student::all();
        // print_r(json_encode($students));
        // die();
        echo 'asdasd';
        return view('Student', compact('students'));
    }

    public function store()
    {
        $students =    [
            'FirstName' => 'joefel',
            'LastName' => 'flores',
            'MiddleName' => 'jamindang',
            'Email' => 'jflores@ssct.edu.ph',
            'Gender' => 'Male',
            'Mobile' => '1',
            'Address' => 'san juan',
        ];
        $update = Student::where('StudentID','=','3')->update($students);
        if($update){
            echo 'success';
        } else {
            echo 'error';
        }
    }
}
