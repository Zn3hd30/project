<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{

    public function add_student()
    {
        return view('add_student');
    }

    public function list_student()
    {
        $Student = Student::all();
        return view('list_student' ,compact('Student'));
    }

    public function delete_student(Request $request){
        $StudentID = $request->StudentID;
        $message = [
            'result' =>false,
            'message' =>'please contact admin'
        ];
        $delete = Student::where('StudentID',$StudentID)->delete();
        if($delete){
            $message = [
                'result' =>true,
                'message' =>'Successfully deleted'
            ];
        } else {
            $message = [
                'result' =>false,
            ]; 
        }
        return json_encode( $message);
    }

    public function store(Request $request)
    {
        $message = [
            'result' =>false,
            'message' =>'please contact admin'
        ];

        if(isset($request->StudentID)){
            //diri ang update/edit na code
            $students =    [
                'StudentID' => $request->StudentID,
                'FirstName' => $request->FirstName,
                'LastName' => $request->LastName,
                'MiddleName' => $request->MiddleName,
                'ExtensionName' => $request->ExtensionName,
                'BirthDate' => $request->BirthDate,
                'Gender' => $request->Gender,
            ];
            $update = Student::where('StudentID',$request->StudentID)->update($students);
            if($update){
                $message['result'] = true;
                $message['message'] = 'Successfully updated.';
            } else {
                $message['message'] = 'Failed updating student.';
            }
            return json_encode($message);
        } else {
            // diri ang save na code
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


        
    }
}
