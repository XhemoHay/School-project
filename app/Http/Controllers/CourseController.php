<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Student;

class CourseController extends Controller
{
    public function index(Request $request){
        
        $students = Student::all();

        $selectedClassFilter = $request->input('classFilter');

        $studentsQuery = Student::query();
    
        if ($selectedClassFilter) {
            $studentsQuery->where('course_id', $selectedClassFilter);
        }
    
        $students = $studentsQuery->get();
        $classes = Course::all();

        return view('prayer', compact('students', 'classes','selectedClassFilter'));
    }

}
