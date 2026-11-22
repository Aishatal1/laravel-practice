<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .success { background-color: #d4edda; color: #155724; padding: 10px; border: 1px solid #c3e6cb; margin-bottom: 20px; }
        .btn { padding: 8px 12px; text-decoration: none; border-radius: 4px; border: none; cursor: pointer; }
        .btn-create { background-color: #007bff; color: white; }
        .btn-edit { background-color: #ffc107; color: black; }
        .btn-delete { background-color: #dc3545; color: white; }
    </style>
</head>
<body>

    <h1>Students List</h1>

    {{-- Success Message --}}
    @if (session('success'))
        <div class="success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('students.create') }}" class="btn btn-create">+ Add New Student</a>

    <table>
        <thead>
            <tr>
                {{-- ID Removed --}}
                <th>Student Number</th>
                <th>Name</th>
                <th>Email</th>
                <th>Major</th> {{-- Major Added --}}
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr>
                    {{-- ID Removed --}}
                    <td>{{ $student->student_number }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->major }}</td> {{-- Major Added --}}
                    <td>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-edit">Edit</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this student?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-delete">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center;">No students found.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>