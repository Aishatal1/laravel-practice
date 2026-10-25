<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
     public function index()
    {
        return 'Students List: Alice, Bob, Charlie';
    }

    public function show($id)
    {
        return 'Showing Student ID: ' . $id;
    }

    public function create()
    {
        return 'Create Student Form';
    }

    public function store(Request $request)
    {
        return 'Student Created (via controller)';
    }

    public function update(Request $request, $id)
    {
        return 'Student Updated (via controller): ' . $id;
    }

    public function destroy($id)
    {
        return 'Student Deleted (via controller): ' . $id;
    }
}
