<div>
    @extends('components.template')
</div>
    <h1>Friends List</h1>
    @if ($friends->isEmpty())
        <p>You have no friends.</p>
    @else
        <ul>
            @foreach ($friends as $friend)
                <li>{{ $friend->name }}</li>
            @endforeach
        </ul>
    @endif

    <h1>You Might Know</h1>
    @if ($youMightKnow->isEmpty())
        <p>No suggestions available.</p>
    @else
        <ul>
            @foreach ($youMightKnow as $suggestedFriend)
                <li>{{ $suggestedFriend->name }} ({{ $suggestedFriend->email }})</li>
            @endforeach
        </ul>
    @endif
