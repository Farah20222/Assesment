<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Students;

class Student extends Component
{
    public $students, $name, $grade, $department, $student_id;
    public $isOpen = 0;

    public function render()
    {
        $this->students = Student::all();
        return view('livewire.students.index');
    }
    
    
    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }

    public function openModal()
    {
        $this->isOpen = true;
    }

    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields(){
        $this->name = '';
        $this->grade = '';
        $this->department = '';
        $this->student_id = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required',
        ]);

        Student::create($validatedData);

        session()->flash('message', 'Student created successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);

        $this->student_id = $id;
        $this->name = $student->name;
        $this->grade = $student->grade;
        $this->department = $student->department;

        $this->openModal();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required',
        ]);

        $student = Student::find($this->student_id);
        $student->update($validatedData);

        session()->flash('message', 'Student updated successfully.');

        $this->closeModal();
        $this->resetInputFields();
    }

    public function delete($id)
    {
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }
}