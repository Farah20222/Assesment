<!-- students/index.blade.php -->
<div>
  <h1>Students</h1>
  <table>
      <thead>
          <tr>
              <th>ID</th>
              <th>Name</th>
              <th>Grade</th>
              <th>Department</th>
              <th>Action</th>
          </tr>
      </thead>
      <tbody>
          @foreach($students as $student)
              <tr>
                  <td>{{ $student->id }}</td>
                  <td>{{ $student->name }}</td>
                  <td>{{ $student->grade }}</td>
                  <td>{{ $student->department }}</td>
                  <td>
                      <a href="{{ route('students.edit', $student->id) }}">Edit</a>
                      
                      <form action="{{ route('students.destroy', $student->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>
  </table>

  <a href="{{ route('students.create') }}">Add Student</a>
</div>

<!-- students/create.blade.php -->
<div>
  <h1>Create Student</h1>

  <form action="{{ route('students.store') }}" method="POST">
      @csrf

      <div>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="{{ old('name') }}">
          @error('name')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <div>
          <label for="grade">Grade:</label>
          <input type="text" name="grade" id="grade" value="{{ old('grade') }}">
          @error('grade')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <div>
          <label for="department">Department:</label>
          <input type="text" name="department" id="department" value="{{ old('department') }}">
          @error('department')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <button type="submit">Submit</button>
  </form>

  <a href="{{ route('students.index') }}">Back to Students</a>
</div>

<!-- students/edit.blade.php -->
<div>
  <h1>Edit Student</h1>

  <form action="{{ route('students.update', $student->id) }}" method="POST">
      @csrf
      @method('PUT')

      <div>
          <label for="name">Name:</label>
          <input type="text" name="name" id="name" value="{{ $student->name }}">
          @error('name')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <div>
          <label for="grade">Grade:</label>
          <input type="text" name="grade" id="grade" value="{{ $student->grade }}">
          @error('grade')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <div>
          <label for="department">Department:</label>
          <input type="text" name="department" id="department" value="{{ $student->department }}">
          @error('department')
              <div>{{ $message }}</div>
          @enderror
      </div>

      <button type="submit">Update</button>
  </form>

  <a href="{{ route('students.index') }}">Back to Students</a>
</div>
```