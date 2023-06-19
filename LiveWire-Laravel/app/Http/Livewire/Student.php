<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Student extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.student', ['students' => $students]);
    }
}
