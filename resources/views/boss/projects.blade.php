<h1>{{ $user->name }}'s Projects</h1>
@foreach($projects as $project)
    <div>
        <h2>Project Title: {{ $project->title }}</h2>
        <p><strong>Details: {{ $project->description }}</strong></p>
        <p><strong>Project Budget: {{ $project->budget }}</strong></p>
        <a href="/projects/{{ $project->id }}/bids">View Bids</a>
    </div>
@endforeach
