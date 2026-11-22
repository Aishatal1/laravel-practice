<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    // 1. Display a listing of the students
    public function index()
    {
        // Fetch all students, newest first
        $students = Student::latest()->get(); 
        
        // Return the 'index' view located in resources/views/students/
        return view('students.index', compact('students'));
    }

    // 2. Show the form for creating a new student
    public function create()
    {
        return view('students.create');
    }

    // 3. Store a newly created student in the database
    public function store(Request $request)
    {
        // Validation Rules
        $validated = $request->validate([
            'student_number' => 'required|unique:students,student_number',
            'name'           => 'required',
            'email'          => 'required|email',
        ]);

        // Create the student using only the validated data
        Student::create($validated);

        // Redirect back to the list with a success message
        return redirect()->route('students.index')
                         ->with('success', 'Student created successfully!');
    }

    // 4. Show the form for editing the specified student
    public function edit(Student $student)
    {
        // Because of Route Model Binding, Laravel automatically fetches the student by ID
        return view('students.edit', compact('student'));
    }

    // 5. Update the specified student in the database
    public function update(Request $request, Student $student)
    {
        // Validation Rules
        // Notice: We append ",{$student->id}" to the unique rule so it ignores the current student
        $validated = $request->validate([
            'student_number' => 'required|unique:students,student_number,' . $student->id,
            'name'           => 'required',
            'email'          => 'required|email',
        ]);

        // Update the student
        $student->update($validated);

        // Redirect back with success message
        return redirect()->route('students.index')
                         ->with('success', 'Student updated successfully!');
    }

    // 6. Remove the specified student from the database
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect()->route('students.index')
                         ->with('success', 'Student deleted successfully!');
    }
}