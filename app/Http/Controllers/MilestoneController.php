<?php

namespace App\Http\Controllers;

use App\Models\Milestone;
use App\Models\Project;
use Illuminate\Http\Request;

class MilestoneController extends Controller
{
    public function create(Project $project)
    {
        return view('milestones.create', ['project' => $project]);
    }
    public function store(Project $project, Request $req)
    {
        $incomingFields = $req->validate([
            'title' => ['required, string'],
            'description' => ['required, string'],
            'amount' => ['required', 'number'],
            'due_date' => ['required', 'date'],
        ]);

        $incomingFields['project_id'] = $project->id;

        Milestone::create($incomingFields);

        return redirect()->route('projects.show', $project->id)
                        ->with('success','Bid submitted successfully!');
    }
    public function edit(Milestone $milestone)
    {
        try {
            $this->authorize('update', $milestone);
            return view('milestones.edit', ['milestone' => $milestone]);
        } catch (\Exception $e) {
            dd($e->getMessage()); // This will display the error message
        }
    }

    //
    public function handle(Request $request, Milestone $milestone)
    {
        if ($request->has('submitButton')) {
            // Freelancer submitting milestone
            $milestone->status = $request->input('status');
            $milestone->save();
            return redirect()->route('projects.show', $milestone->project_id)
                ->with('success','Milestone updated successfully!');
}

        elseif ($request->has('approveButton')) {
            return redirect()->route('payments.create', $milestone->id);
}

        elseif ($request->has('updateMilestone')) {
            $incomingFields = $request->validate([
                'title' => ['required', 'string', 'max:255'],
                'description' => ['nullable', 'string'],
                'amount' => ['required', 'numeric', 'min:0'],
                'due_date' => ['required', 'date'],
            ]);
            $milestone->update($incomingFields);

            return redirect()->route('projects.show', $milestone->project_id)
                ->with('success','Milestone updated successfully!');
        }    

        return back()->with('error', 'No valid action provided.');
    }

}