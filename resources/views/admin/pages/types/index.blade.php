@extends('admin.pages.admin')
@section('content')
    <h1>Room Types</h1>
    <a href="{{route("admin.types.create")}}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new type
    </a>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>CAPACITY</th>
            <th>ACTIONS</th>
        </tr>
        @foreach($types as $type)
            <tr>
                <td>{{$type->id}}</td>
                <td>{{$type->name}}</td>
                <td>{{$type->capacity}}</td>
                <td>
                    <a href="{{ route("admin.types.edit", $type->id) }}" class="btn btn-update" data-id="{{ $type->id }}">Update</a>
                    <form action="{{ route('admin.types.destroy', $type->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this type?')">Delete</button>
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
    {{$types->links()}}
@endsection
