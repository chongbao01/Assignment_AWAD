<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Milestone;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProjectController extends Controller
{
    // public function index()
    // {
    //     $projects = Project::all();
    //     return view('projects.index', compact('projects'));
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Project $project)
    // {
    //     $project = Project::findOrFail($project->id);
    //     $milestones = collect();
        
    //     if ($project->status === 'assigned' && ($project->freelancer_id === Auth::id() || $project->owner_id === Auth::id())) {
    //         $milestones = Milestone::where('project_id', $project->id)->get();
    //     }
    //     $bids = collect();
    //     if ($project->status === 'open' && $project->owner_id === Auth::id()) {
    //         $bids = Bid::where('project_id', $project->id)->get();
    //     }
    //     return view('projects.show', compact('project', 'milestones', 'bids'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     //
    // }

    // public function showBids(Project $project)
    // {
    //     $this->authorize('viewBids', $project);
    //     return response()->json($project->bids);
    // }
    //JR bid version
    public function bossProjects(User $user) {
        $projects = $user->projects;
        return view('boss.projects', compact('user', 'projects'));
    }

    public function index() {
        $projects = Project::where('status', 'open')->get();
        return view('freelancer.projects', compact('projects'));
    }
    
}
