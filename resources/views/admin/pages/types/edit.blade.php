@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Edit Type</h2>
        <form action="{{ route('admin.types.update', ["type" => $type->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Type name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter type name" value="{{$type->name}}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label for="capacity">Room Capacity</label>
                <input type="number" class="form-control-file" name="capacity" id="capacity" value="{{$type->capacity}}">
                @error('capacity')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
