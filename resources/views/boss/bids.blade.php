<h1>Bids for {{ $project->title }}</h1>
@foreach($bids as $bid)
    <div>
    <p>
    <strong>{{ $bid->freelancer->name ?? 'Unknown Freelancer' }}</strong>:
    RM {{ $bid->bid_amount }}
    </p>
        <p>{{ $bid->msg }}</p>
        @if($project->status == 'open')
        <form method="POST" action="/bids/{{ $bid->id }}/assign">
            @csrf
            <button type="submit">Assign to this Freelancer</button>
        </form>
        @endif
    </div>
@endforeach
