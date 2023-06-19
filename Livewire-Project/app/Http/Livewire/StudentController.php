<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentController extends Component
{
    public $students;
    public $name;
    public $grade;
    public $department;
    
    public function render()
    {
        $this->students = Student::all();
        return view('livewire.student');
    }

    public function create()
    {
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required'
        ]);

        Student::create([
            'name' => $this->name,
            'grade' => $this->grade,
            'department' => $this->department
        ]);

        $this->reset();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $this->name = $student->name;
        $this->grade = $student->grade;
        $this->department = $student->department;
    }

    public function update($id)
    {
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required'
        ]);

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $this->name,
            'grade' => $this->grade,
            'department' => $this->department
        ]);

        $this->reset();
    }

    public function delete($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
    }
}
