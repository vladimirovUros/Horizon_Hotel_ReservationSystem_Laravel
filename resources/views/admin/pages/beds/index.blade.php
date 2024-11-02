@extends('admin.pages.admin')
@section('content')
    <h1>Room Beds</h1>
    <a href="{{route("admin.beds.create")}}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new bed
    </a>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>ACTIONS</th>
        </tr>
        @foreach($beds as $bed)
            <tr>
                <td>{{$bed->id}}</td>
                <td>{{$bed->name}}</td>
                <td>
                    <a href="{{ route("admin.beds.edit", $bed->id) }}" class="btn btn-update" data-id="{{ $bed->id }}">Update</a>
                    <form action="{{ route('admin.beds.destroy', $bed->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this bed?')">Delete</button>
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
    {{$beds->links()}}
@endsection
