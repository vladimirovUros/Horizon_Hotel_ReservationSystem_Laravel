@extends('admin.pages.admin')
@section('content')
    <h1>All Users</h1>
    <a href="{{ route("admin.users.create") }}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new user
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <tr>
                <th>#ID</th>
                <th>USERNAME</th>
                <th>FULL_NAME</th>
                <th>EMAIL</th>
                <th>ACTIVE</th>
                <th>ACC LOCKED</th>
                <th>PROFILE_IMAGE</th>
                <th>ROLE</th>
                <th>UPDATE</th>
                <th>DELETE</th>
            </tr>
            @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->active}}</td>
                    <td>{{$user->acc_locked}}</td>
                    <td>
                        <img src="{{ asset('assets/img/users/' . $user->profile_image) }}" alt="profile_image">
                    </td>

                    <td>{{$user->role->name}}</td>
                    <td><a href="{{ route("admin.users.edit", $user->id) }}" class="btn btn-update" data-id="{{ $user->id }}">Update</a></td>

                    <td>
                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Are you sure you want to delete user {{$user->username}}?')">Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-danger">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$users->links()}}
@endsection
