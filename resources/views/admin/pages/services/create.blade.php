@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Add New Service</h2>
        <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Service name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter service name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="icon">Service icon</label>
                <input type="file" class="form-control-file" name="icon" id="icon">
                @error('icon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
