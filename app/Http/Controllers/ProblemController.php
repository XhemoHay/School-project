<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Problem;

use Illuminate\Http\Request;

class ProblemController extends Controller
{
    // public function index(){

    //     $students = Student::all();
    
    //     return view('izjava', ['students' => $students]);
        
    // }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'student_id' => ['required', 'string'],
        ]);

    
        $problem = Problem::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'student_id' => $validatedData['student_id'],
        ]); 

        $student = Student::find($validatedData['student_id']);


        return redirect()->route('student.show', ['student' => $student->id])->with('success', 'Problem created successfully');
    }
}
