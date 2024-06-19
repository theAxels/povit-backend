<div>
    @extends('components.template')
    {{-- @foreach ($images as $post)
        <div class="post">
            <h2>{{ $post->caption }}</h2>
            @if ($post->pict)
                <img src="{{ url('user_post/' . $post->pict) }}" alt="Post Image">
                {{$post->pict}}
            @endif
            <p>Location: {{ $post->location }}</p>
            <p>Posted at: {{ $post->created_at }}</p>
        </div>
    @endforeach --}}
    {{-- tes data udah keluar --}}
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
