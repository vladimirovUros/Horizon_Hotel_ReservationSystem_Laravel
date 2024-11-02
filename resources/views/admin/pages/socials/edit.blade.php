@extends('admin.pages.admin')
@section('content')
    <div class="container">
        <h2>Update Social</h2>
        <form action="{{ route('admin.socials.update', $social->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="icon">Icon</label>
                <input type="text" name="icon" class="form-control" id="icon" aria-describedby="iconHelp"
                       placeholder="Enter icon" value="{{ $social->icon }}">
            </div>
            <div class="form-group">
                <label for="link">Link</label>
                <input type="text" name="link" class="form-control" id="link" aria-describedby="linkHelp"
                       placeholder="Enter link" value="{{ $social->link }}">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
