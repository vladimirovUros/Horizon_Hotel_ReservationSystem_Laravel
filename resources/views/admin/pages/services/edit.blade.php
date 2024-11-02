@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Edit Service</h2>
        <form action="{{ route('admin.services.update', ["service" => $service->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Service name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter service name" value="{{$service->name}}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label>Current Icon:</label><br>
                @if($service->path)
                    <img src="{{ asset('assets/img/services/' . $service->path) }}" alt="Current Icon" style="max-width: 100px;">
                @else
                    <span>No icon uploaded</span>
                @endif
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
