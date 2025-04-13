<h1>{{ $user->name }}'s Bids</h1>
@foreach($bids as $bid)
    <div>
        <h2>{{ $bid->project->title?? 'Project not found' }}</h2>
        <p>Amount: RM {{ $bid->bid_amount }}</p>
        <p>Status: {{ $bid->status }}</p>
        <a href="/bids/{{ $bid->id }}/edit">Edit</a>
    </div>
@endforeach
