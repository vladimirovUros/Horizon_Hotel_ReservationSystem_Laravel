@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Add New Type</h2>
        <form action="{{ route('admin.types.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Type name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter type name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="capacity">Room Capacity</label>
                <input type="number" class="form-control-file" name="capacity" id="capacity">
                @error('capacity')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
