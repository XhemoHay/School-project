<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Prayer;
use App\Models\Course;

use Illuminate\Http\Request;

class PrayerController extends Controller
{
    public function index(Request $request)
    {
        $students = Student::all();

        $selectedClassFilter = $request->input('classFilter');
        $selectedSalahFilter = $request->input('salah');

        $studentsQuery = Student::query();
    
        if ($selectedClassFilter) {
            $studentsQuery->where('course_id', $selectedClassFilter);
        }
    
        $students = $studentsQuery->get();
        $classes = Course::all();

        return view('prayer', compact('students', 'classes', 'selectedClassFilter', 'selectedSalahFilter'));
    }



    public function store(Request $request)
    {
           
        $request->validate([
            'students' => 'required|array|min:1',
            'salah' => 'required|string',
        ]);
    
        $selectedStudents = $request->input('students', []);
        $salah = $request->input('salah');
    
    
        foreach ($selectedStudents as $studentId) {
            Prayer::create([
                'student_id' => $studentId,
                'salah' => $salah,  
            ]);

        
    }
    // return redirect()->route('prayers.index')->with('success', 'Prayers recorded successfully.');

    return redirect()->back()->withInput();
}
}