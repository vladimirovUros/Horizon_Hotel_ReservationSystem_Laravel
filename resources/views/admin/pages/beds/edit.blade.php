@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Edit Bed</h2>
        <form action="{{ route('admin.beds.update', ["bed" => $bed->id])}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group mb-3">
                <label for="name">Bed name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter bed name" value="{{$bed->name}}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
