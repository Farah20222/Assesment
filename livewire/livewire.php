<?php

/*
 * Install Alpine, tailwind and filepond using npm in laravel
 *
 * Objective 1 : Create a Student Model CRUD using Livewire only, You can have the fields for example ( id,name,grade,department )
 * Objective 2 : Also add a Student Image uploader using  Livewire , Alpine Js and Filepond
 * Objective 3 : Implement the Query caching on Models and it must be handled properly.
 
 * File Pond : https://pqina.nl/filepond/
 * Alpine js Documentation : https://alpinejs.dev/
 * Tailwind Documentation : https://tailwindcss.com/
 * Livwire Documentation : https://laravel-livewire.com/
*/
use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Student;

class StudentCrud extends Component
{
  // Enable file uploads with Livewire
    use WithFileUploads;

     // Public properties for input fields and data
    public $students, $name, $grade, $department, $image;

    public function render()
    {
      // Get all student data from the database and return in a view 
        $this->students = Student::all();
        return view('livewire.student-crud');
    }

    public function create()
    {
      // Validate input fields fo image upload 
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required',
            'image' => 'required|image',
        ]);

        $imageName = time().'.'.$this->image->extension();
        $this->image->storeAs('/images', $imageName);

        // Create new student in the database
        Student::create([
            'name' => $this->name,
            'grade' => $this->grade,
            'department' => $this->department,
            'image' => $imageName,
        ]);

        // Flash success message 
        session()->flash('message', 'Created successfully.');

        $this->resetInputFields();
    }



    public function edit($id)
    {
      // Get the student record with the given id and set the fields to the corresponding values
        $student = Student::findOrFail($id);
        $this->name = $student->name;
        $this->grade = $student->grade;
        $this->department = $student->department;
    }

    public function update()
    {
      // Validate input field and update student record
        $this->validate([
            'name' => 'required',
            'grade' => 'required',
            'department' => 'required',
        ]);

        $student = Student::find($id);
        $student->update([
            'name' => $this->name,
            'grade' => $this->grade,
            'department' => $this->department,
        ]);

        session()->flash('message', 'Student updated successfully.');

        $this->resetInputFields();
    }

    public function delete($id)
    {
      // Delete student with the given id 
        Student::find($id)->delete();
        session()->flash('message', 'Student deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->grade = '';
        $this->department = '';
        $this->image = '';
    }
}