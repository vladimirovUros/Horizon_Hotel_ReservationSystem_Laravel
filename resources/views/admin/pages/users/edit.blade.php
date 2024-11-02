@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Edit User</h2>
        <form action="{{ route('admin.users.update', ['user' => $user->id]) }}" method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control" id="username" aria-describedby="nameHelp"
                       placeholder="Enter username" value="{{$user->username}}">
                @error('username')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="full_name">Full Name</label>
                <input type="text" name="full_name" class="form-control" id="full_name" aria-describedby="sizeHelp"
                       placeholder="Enter full name" value="{{$user->full_name}}">
                @error('full_name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" id="email" aria-describedby="priceHelp"
                       placeholder="Enter email" value="{{$user->email}}">
                @error('email')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" id="password"
                       aria-describedby="descriptionHelp"
                       placeholder="Enter password">
                @error('password')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="profile_image">Profile image</label>
                <div class="image-preview">
                    @if($user->profile_image)
                        <img src="{{ asset('assets/img/users/' . $user->profile_image) }}" alt="Profile Image"
                             class="img-thumbnail">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>
                <input type="file" class="form-control-file" name="profile_image" id="profile_image">
                @error('profile_image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="role">Role</label>
                <select name="role" id="role" class="form-control">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" {{ $role->id == $user->role_id ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select>
                @error('role')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="active">Active</label>
                <input type="checkbox" name="active" id="active" value="1" {{ $user->active == 1 ? 'checked' : '' }}>
            </div>
            <div class="form-group">
                <label for="acc_locked">Account locked</label>
                <input type="checkbox" name="acc_locked" id="acc_locked" value="1" {{ $user->acc_locked == 1 ? 'checked' : '' }}>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
