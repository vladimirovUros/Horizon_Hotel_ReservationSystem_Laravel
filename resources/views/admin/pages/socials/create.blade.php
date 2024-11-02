@extends('admin.pages.admin')
@section('content')
    <div class="container">
        <h2>Add New Social</h2>
        <form action="{{ route('admin.socials.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" name="icon" class="form-control" id="icon" aria-describedby="iconHelp"
                       placeholder="Enter icon">
                @error('icon')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" id="link" aria-describedby="linkHelp"
                       placeholder="Enter link">
                @error('link')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
