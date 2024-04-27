<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use Illuminate\Http\Request;

class TeacherAssignmentController extends Controller
{
    public function index()
    {
        return Assignment::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'deadline' => 'required|date'
        ]);

        $assignment = Assignment::create($validated);
        return response()->json($assignment, 201);
    }

    public function show(Assignment $assignment)
    {
        return $assignment;
    }

    public function update(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'title' => 'sometimes|required|max:255',
            'description' => 'sometimes|required',
            'deadline' => 'sometimes|required|date'
        ]);

        $assignment->update($validated);
        return response()->json($assignment);
    }

    public function destroy(Assignment $assignment)
    {
        $assignment->delete();
        return response()->json(null, 204);
    }
}
