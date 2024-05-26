<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Student;
use App\Models\Prayer;
use App\Models\Course;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Log;


class Namaz extends Component
{

    use WithPagination;
 

    public $selectedSalah;
    public $selectedClass;

    public $students;

    public $selectedStudents = [];
    


    public function render()
    {    
        return view('livewire.namaz', [
            'classes' => Course::all(),
        ]);
    }


    public function updateClass()
    {
        if ($this->selectedClass) {

            $this->students = Student::where('course_id', $this->selectedClass)->get();

        } else {

            $this->students = [];
        }

        $this->selectedStudents = [];
    }

    public function saveSalah()
    {
       
        // Store the selected students who didn't pray
        if (!empty($this->selectedStudents)) {
            foreach ($this->selectedStudents as $studentId) {
                Prayer::create([
                    'student_id' => $studentId,
                    'salah' => $this->selectedSalah,  
                ]);
            }
        }

        // Reset the selected students array after storing them
        $this->selectedStudents = [];

        // Show a success message or perform any other action after saving
        session()->flash('message', 'Attendance saved successfully!');
    }

    public function hideMessage()
    {
        session()->forget('message');
    }
}
