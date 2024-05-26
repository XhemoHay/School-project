<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Course;


class StudentController extends Controller
{

public function index(Request $request)
{
    $user = auth()->user();

    if ($user->role === 'ADMIN' || $user->role === 'EDUCATOR') {
        $studentsQuery = Student::query();

        // Apply class filter if selected
        $classFilter = $request->query('classFilter');
        if ($classFilter) {
            $studentsQuery->whereHas('course', function ($query) use ($classFilter) {
                $query->where('id', $classFilter);
            });
        }
    } elseif ($user->role === 'PROFESSOR') {
        if ($user->courses) {
            $studentsQuery = $user->courses->students();
        } else {
            return view('welcome');
        }
    }


    $students = $studentsQuery->paginate(10);
    $classes = Course::all();
    $totalStud = Student::all();

    $numStud = $totalStud->count();
    $numClass = count($classes);


    return view('students', ['students' => $students,
                            'classes' => $classes,
                            'numStud' => $numStud,
                            'numClass' => $numClass
                        ]);
}




public function show(Student $student){
    
    $problems = $student->problems()->orderBy('created_at', 'desc')->get();

    $countProb =  $problems->count();

    $prayers = $student->prayers()->orderBy('created_at', 'desc')->get();
    $countPrayer =  $prayers->count();



    return view('student', [
        'student' => $student, 
        'problems' => $problems,  
        'countProb' => $countProb,
        'prayers' => $prayers,  
        'countPrayer' => $countPrayer
    ]);
}
}