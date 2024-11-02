@extends('admin.pages.admin')
@section('content')
    <h1>All socials</h1>
    <a href="{{route("admin.socials.create")}}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new social
    </a>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>ICON</th>
            <th>LINK</th>
            <th>ACTIONS</th>
        </tr>
        @foreach($socials as $social)
            <tr>
                <td>{{$social->id}}</td>
                <td><i class="{{$social->icon}}"></i></td>
                <td>{{$social->link}}</td>
                <td>
                    <a href="{{ route("admin.socials.edit", $social->id) }}" class="btn btn-update" data-id="{{ $social->id }}">Update</a>
                    <form action="{{ route('admin.socials.destroy', $social->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this social?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-danger">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$socials->links()}}
@endsection
