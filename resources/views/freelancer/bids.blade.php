<h1>{{ $user->name }}'s Bids</h1>
@foreach($bids as $bid)
    <div>
        <h2>{{ $bid->project->title ?? 'Project not found'}}</h2>
        <p>Amount: RM {{ $bid->bid_amount }}</p>
        <p>Status: {{ $bid->status }}</p>

    @if($bid->status === 'pending')
        <a href="/bids/{{ $bid->id }}/edit">Edit</a>
    @else
        <span style="color:blue; font-weight: bold;">The project is no more accepting bids. ({{ ucfirst($bid->status) }})</span>
    @endif

    </div>
@endforeach
