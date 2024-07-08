<h1>Close Friends List</h1>
@if ($closeFriends->isEmpty())
    <p>You have no friends.</p>
@else
    <ul>
        @foreach ($closeFriends as $friend)
            <li>{{ $friend->name }}</li>
        @endforeach
    </ul>
@endif