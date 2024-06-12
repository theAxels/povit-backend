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
