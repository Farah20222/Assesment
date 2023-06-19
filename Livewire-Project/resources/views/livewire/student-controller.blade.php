<div>
    <form wire:submit.prevent="create">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" wire:model="name">
            @error('name')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="grade">Grade:</label>
            <input type="text" id="grade" wire:model="grade">
            @error('grade')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="department">Department:</label>
            <input type="text" id="department" wire:model="department">
            @error('department')
                <div>{{ $message }}</div>
            @enderror
        </div>
        <button type="submit">Save</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Department</th>
                <th>Actions</th>
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
                    <button wire:click="edit({{ $student->id }})">Edit</button>
                    <button wire:click="delete({{ $student->id }})">Delete</button>
                </td>
           Continued from previous response:

            </tr>
            @endforeach
        </tbody>
    </table>
</div>