<?php

namespace App\Http\Controllers;

use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Http\Request;

class StudentAssignmentController extends Controller
{
    public function index()
    {
        // Assume a relation exists on the Assignment model to check if the student is assigned
        return Assignment::where('student_id', auth()->id())->get();
    }

    public function show(Assignment $assignment)
    {
        // Access control to ensure the student is viewing their own assignment
        return $assignment;
    }

    public function submit(Request $request, Assignment $assignment)
    {
        $validated = $request->validate([
            'content' => 'required',
            // File handling logic could also be added here
        ]);

        $submission = new Submission($validated);
        $submission->assignment_id = $assignment->id;
        $submission->student_id = auth()->id();
        $submission->save();

        return response()->json($submission, 201);
    }

    public function updateSubmission(Request $request, Assignment $assignment)
    {
        $submission = Submission::where('assignment_id', $assignment->id)
                                ->where('student_id', auth()->id())->firstOrFail();

        $validated = $request->validate([
            'content' => 'required',
        ]);

        $submission->update($validated);
        return response()->json($submission);
    }

    public function deleteSubmission(Assignment $assignment)
    {
        $submission = Submission::where('assignment_id', $assignment->id)
                                ->where('student_id', auth()->id())->firstOrFail();

        $submission->delete();
        return response()->json(null, 204);
    }
}
