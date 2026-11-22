<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Student</title>
    <style>
        body { font-family: sans-serif; margin: 40px; }
        .form-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; }
        input { width: 300px; padding: 8px; border: 1px solid #ccc; border-radius: 4px; }
        .error { color: red; font-size: 14px; margin-top: 5px; }
        .btn { padding: 10px 15px; background-color: #28a745; color: white; border: none; border-radius: 4px; cursor: pointer; text-decoration: none; }
        .btn-cancel { background-color: #6c757d; }
    </style>
</head>
<body>

    <h1>Edit Student: {{ $student->name }}</h1>

    @if ($errors->any())
        <div style="background-color: #f8d7da; color: #721c24; padding: 10px; border: 1px solid #f5c6cb; margin-bottom: 20px; border-radius: 4px;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Student Number:</label>
            <input type="text" name="student_number" value="{{ old('student_number', $student->student_number) }}">
            @error('student_number')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name" value="{{ old('name', $student->name) }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label>Email:</label>
            <input type="email" name="email" value="{{ old('email', $student->email) }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        {{-- Major Added --}}
        <div class="form-group">
            <label>Major:</label>
            <input type="text" name="major" value="{{ old('major', $student->major) }}">
            @error('major')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn">Update Student</button>
        <a href="{{ route('students.index') }}" class="btn btn-cancel">Cancel</a>
    </form>

</body>
</html>