<h1>Available Projects</h1>
@foreach($projects as $project)
    <div>
        <h2>{{ $project->title }} - RM {{ $project->budget }}</h2>
        <p>{{ $project->description }}</p>
        <form method="POST" action="/projects/{{ $project->id }}/bids">
            @csrf
            <input type="hidden" name="user_id" value="1"><!-- Assume logged-in freelancer id -->
            <input type="number" name="bid_amount" placeholder="Your Bid">
            <textarea name="msg" placeholder="Message"></textarea>
            <input type="hidden" name="freelancer_id" value="2"><!-- Assume logged-in freelancer id -->
            <button type="submit">Submit Bid</button>
        </form>
    </div>
@endforeach
