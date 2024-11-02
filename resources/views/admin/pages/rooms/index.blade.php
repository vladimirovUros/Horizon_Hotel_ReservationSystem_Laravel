@extends('admin.pages.admin')
@section('content')
    <h1>All Rooms</h1>
    <a href="{{route("admin.rooms.create")}}" class="btn btn-primary">
        <i class="fas fa-plus"></i> Add new room
    </a>
    <table class="table table-striped ">
        <tr>
            <th>#ID</th>
            <th>NAME</th>
            <th>SIZE</th>
            <th>DESCRIPTION</th>
            <th>MAIN_IMAGE</th>
            <th>ROOM TYPE</th>
            <th>UPDATE</th>
            <th>DELETE</th>
        </tr>
        @foreach($rooms as $room)
            <tr>
                <td>{{$room->id}}</td>
                <td>{{$room->name}}</td>
                <td>{{$room->size}}m<sup>2</sup></td>
                <td>
                    <div class="description-container">
                        @if(strlen($room->description) > 100)
                            <span class="truncated-description">{{substr($room->description, 0, 100)}} ...</span>
                            <span class="info-icon" title="{{$room->description}}">ℹ️</span>
                        @else
                            <span class="truncated-description">{{$room->description}}</span>
                        @endif
                    </div>
                </td>

                <td><img src="{{ asset('assets/img/rooms/' . $room->main_image_path) }}" alt="main_image"></td>
                <td>{{$room->type->name}}</td>
                {{--                <td>--}}
                {{--                    ${calculateAverageRating(d.reviews)}--}}
                {{--                </td>--}}
                {{--                <td>--}}
                {{--                    ${d.reviews.length === 0 ? 'No comments' : d.reviews.length}--}}
                {{--                </td>--}}
                <td><a href="{{ route("admin.rooms.edit", $room->id) }}" class="btn btn-update" data-id="{{ $room->id }}">Update</a></td>
                <td>
                    <!-- Create a form for room deletion -->
                    <form action="{{ route('admin.rooms.destroy', $room->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this room?')">Delete</button>
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
    {{$rooms->links()}}
@endsection

