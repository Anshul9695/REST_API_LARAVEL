<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function create_students(Request $request)
    {
        $student = new Student;
        $student->student_name = $request->student_name;
        $student->email = $request->email;
        $student->address = $request->address;
        $student->save();
        return response()->json([
            'message' => 'student Record Created Successfully'
        ], 201);
    }

    public function getAllStudents()
    {
        $students = Student::get()->toJson(JSON_PRETTY_PRINT);
        return response($students, 200);
    }

    public function get_student_by_id($id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::Where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($student, 200);
        } else {
            return response()->json(['message' => 'student not fount'], 404);
        }
    }
    public function update_student_record(Request $request, $id)
    {
        if (Student::where('id', $id)->exists()) {
            $student = Student::find($id);
            // echo $student;
            $student->student_name = is_null($request->student_name) ? $student->student_name : $request->student_name;
            $student->email = is_null($request->email) ? $student->email : $request->email;
            $student->address = is_null($request->address) ? $student->address : $request->address;
            $student->save();
            return response()->json(['message' => 'recored Updated successfully']);
        } else {
            return response()->json(['message' => 'Student Not Found On This ID'], 404);
        }
    }

    public function Delete_Student_record($id){
        if(Student::where('id',$id)->exists()){
          $student=Student::find($id);
        //   echo $student;
        //   die;
          $student->delete();
          return response()->json(['message'=>'Recored Deleted Successfully'],202);
        }else{
            return response()->json(['message'=>'Student Record not found on this ID'],404);
        }
    }
}
