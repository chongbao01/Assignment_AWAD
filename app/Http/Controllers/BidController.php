<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BidController extends Controller
{
    // public function show()
    // {
        
    // }

    // public function create(Project $project)
    // {
    //     return view('bids.create', ['project' => $project]);
    // }  

    // public function store(Project $project, Request $req)
    // {
    //     $incomingFields = $req->validate([
    //         'bid_amount'=>['required','numeric'],
    //         'msg'=>['required','string'],
    //     ]);
    //     $incomingFields['project_id'] = $project->id;
    //     $incomingFields['freelancer_id'] = Auth::id();

    //     Bid::create($incomingFields);

    //     return redirect()->route('projects.show', $project->id)
    //                     ->with('success','Bid submitted successfully!');
    // }
    public function showBids(Project $project) {
        $bids = $project->bids()->with('freelancer')->get();
        return view('boss.bids', compact('project', 'bids'));
    }

    public function freelancerBids(User $user) {
        $bids = $user->bids()->with('project')->get();
        return view('freelancer.bids', compact('user', 'bids'));
    }

    public function store(Request $request, Project $project) {
        Bid::create([
            'project_id' => $project->id,
            'freelancer_id' => 2,
            'bid_amount' => $request->bid_amount,
            'msg' => $request->msg,
            'status' => 'pending'
        ]);
        return redirect()->back()->with('success', 'Bid submitted successfully!');
    }

    public function edit(Bid $bid) {

        //Prevent editing bid_amount and message if the bid is accepted or rejected by boss
        if(in_array($bid->status, ['accepted', 'rejected'])){
            return redirect()->back()->with('error', 'You cannot edit a bid that has been accepted or rejected!');
        }

        return view('freelancer.edit_bid', compact('bid'));
    }

    public function update(Request $request, Bid $bid) {
        $bid->update([
            'bid_amount' => $request->bid_amount,
            'msg' => $request->msg,
        ]);
        return redirect()->route('freelancer.bids', ['user' => $bid->freelancer_id])->with('success', 'Bid updated successfully!');
    }

    public function assign(Bid $bid) {
        $project = $bid->project;
        $project->update([
            'status' => 'assigned',
            'freelancer_id' => $bid->freelancer_id,
        ]);
        $bid->update([
            'status' => 'accepted'
        ]);

        // Reject all other bids for the project
        Bid::where('project_id', $project->id)
            ->where('id', '!=', $bid->id)
            ->update(['status' => 'rejected']);

        return redirect()->back()->with('success', 'Bid assigned successfully!');
    }


}
