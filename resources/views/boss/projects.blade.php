<h1>{{ $user->name }}'s Projects</h1>
@foreach($projects as $project)
    <div>
        <h2>{{ $project->title }}</h2>
        <p>{{ $project->description }}</p>
        <a href="/projects/{{ $project->id }}/bids">View Bids</a>
    </div>
@endforeach
