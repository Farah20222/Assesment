<div>
    <button wire:click="create()">Add Student</button>
    <br><br>
    @if(session()->has('message'))
        <div>{{ session('message') }}</div>
    @endif
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Department</th>
                <th>Image</th>
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
                        @if($student->image)
                            <img src="{{ asset('storage/images/' . $student->image) }}" alt="{{ $student->name }}" width="50">
                        @else
                            No image
                        @endif
                    </td>
                    <td>
                        <button wire:click="edit({{ $student->id }})">Edit</button>
                        <button wire:click="delete({{ $student->id }})" onclick="return confirm('Are you sure?')">Delete</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <form wire:submit.prevent="store">
        <div>
            <label for="name">Name:</label>
            <input type="text" name="name" id="name" wire:model="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="grade">Grade:</label>
            <input type="text" name="grade" id="grade" wire:model="grade">
            @error('grade')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="department">Department:</label>
            <input type="text" name="department" id="department" wire:model="department">
            @error('department')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <div>
            <input type="file" name="image" id="image" wire:model="image">
            @error('image')
                <div>{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>

    <div wire:ignore.self class="{{ $isOpen ? '' : 'hidden' }}">
        <div>
            <button wire:click="closeModal">X</button>
        </div>

        <form wire:submit.prevent="update">
            <input type="hidden" name="student_id" wire:model="student_id">

            <div>
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" wire:model="name">
                @error('name')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="grade">Grade:</label>
                <input type="text" name="grade" id="grade" wire:model="grade">
                @error('grade')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="department">Department:</label>
                <input type="text" name="department" id="department" wire:model="department">
                @error('department')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <div>
                @if($image)
                    <img src="{{ $image->temporaryUrl() }}" alt="{{ $name }}" width="50">
                @elseif($student->image)
                    <img src="{{ asset('storage/images/' . $student->image) }}" alt="{{ $name }}" width="50">
                @else
                    No image
                @endif
            </div>

            <div>
                <input type="file" name="image" id="image" wire:model="image">
                @error('image')
                    <div>{{ $message }}</div>
                @enderror
            </div>

            <button type="submit">Update</button>
        </form>
    </div>
</div>