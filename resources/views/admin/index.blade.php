@extends('layouts.app')

@section('title', 'Admin Page')

@section('content')
    <a href="{{ route('logout') }}" class="btn btn-primary">Log Out</a>
    <div class="text-end mb-5">
        <a href="" class="btn btn-primary"></a>
    </div>

    <form action="" method="get">
        <input type="search" name="search" value="{{session('key')}}" placeholder="Search..." class="form-control my-3">

    </form>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Profile Pic</th>
                <th>Roles</th>
            </tr>
        </thead>
        <tbody>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>

                        <td>
                            @if ($item->profile_pic)
                            <img src="{{ asset('user_profile/' . $item->profile_pics) }}" alt="{{ $item->name }}" style="max-width: 50px">
                            @else
                            "No image"
                            @endif
                        </td>

                        <td>{{ $item->Roles }}</td>
                        <td>

                            {{-- <a href="{{ route('admin.show', $id = $item->id) }}" class="btn btn-sm btn-secondary">View</a>
                            <a href="{{ route('admin.edit', $id = $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                            <form action="{{route('admin.destroy', $item->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete this?')">Delete</button>
                            </form> --}}

                        </td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    {{ $users->links() }}
@endsection
