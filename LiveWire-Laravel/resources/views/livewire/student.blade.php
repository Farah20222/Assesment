<head>
    ...
    <link href="{{ asset('css/filepond.css') }}" rel="stylesheet">
    <script src="{{ asset('js/filepond-plugin-file-encode.min.js') }}"></script>
</head>
<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Grade</th>
                <th>Department</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr>
                <td>{{ $student->id }}</td>
                <td>{{ $student->name }}</td>
                <td>{{ $student->grade }}</td>
                <td>{{ $student->department }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div x-data="{ image: '' }">
    <input type="file" 
           x-ref="filepond" 
           name="image" 
           x-on:change="image = $refs.filepond.files()[0].getFileEncodeBase64()" 
           class="filepond"
           accept="image/*"
           data-max-file-size="3MB"
           data-max-file-size-translated="File size is too big. Max size is {filesize}."
           data-allow-reorder="true"
           data-allow-multiple="false"
           data-max-files="1"
           data-max-parallel-uploads="1"
           data-max-parallel-uploads-translated="Max {count} file(s) are allowed to be uploaded at the same time."
           data-filepond-server="{{ route('student.upload') }}"
           data-poster="{{ asset('storage/default.png') }}"
           data-filepond-max-file-size="3MB"
           data-filepond-max-file-size-translated="File size is too big. Max size is {filesize}.">
    <img :src="image ? image : '{{ asset('storage/default.png') }}'">
</div>