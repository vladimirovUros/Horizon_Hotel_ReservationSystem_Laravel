@extends('admin.pages.admin')
@section('content')
    <h1>Room Services</h1>
    <a href="{{route("admin.services.create")}}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new service
    </a>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>ICON</th>
            <th>ACTIONS</th> <!-- New combined column for actions -->
        </tr>
        @foreach($services as $service)
            <tr>
                <td>{{$service->id}}</td>
                <td>{{$service->name}}</td>
                <td><img src="{{ asset("assets/img/services/" . $service->path) }}" alt="Service Image"></td>
                <td>
                    <a href="{{ route("admin.services.edit", $service->id) }}" class="btn btn-update" data-id="{{ $service->id }}">Update</a>
                    <!-- Create a form for service deletion -->
                    <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this service?')">Delete</button>
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
    {{$services->links()}}
@endsection
