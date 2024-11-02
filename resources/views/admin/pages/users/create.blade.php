@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Add New User</h2>
        <form action="{{ route('admin.users.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="nameHelp"
                       placeholder="Enter username">
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name" aria-describedby="sizeHelp"
                       placeholder="Enter full name">
                @error('full_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" aria-describedby="priceHelp"
                       placeholder="Enter email">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password" aria-describedby="descriptionHelp"
                       placeholder="Enter password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="profile_image">Profile image</label>
                <input type="file" class="form-control-file" name="profile_image" id="profile_image">
                @error('profile_image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{$role->id == 2 ? 'selected' : ''}}>{{ $role->name }} </option>
                    @endforeach
                </select>
                @error('role')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
