<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        return response()->json(Student::all());
    }

    public function store(Request $request)
    {
        $student = Student::create($request->all());

        return response()->json([
            'message' => 'Student created successfully',
            'data' => $student
        ], 201);
    }

    public function show(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        return response()->json($student);
    }

    public function update(Request $request, string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $student->update($request->all());

        return response()->json([
            'message' => 'Student updated successfully',
            'data' => $student
        ]);
    }

    public function destroy(string $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json([
                'message' => 'Student not found'
            ], 404);
        }

        $student->delete();

        return response()->json([
            'message' => 'Student deleted successfully'
        ]);
    }
}