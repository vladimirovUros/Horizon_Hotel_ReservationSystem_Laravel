@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Add New Room</h2>
        <form action="{{ route('admin.rooms.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">Room Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter room name">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="size">Room Size (square meters)</label>
                <input type="number" name="size" class="form-control" id="size" aria-describedby="sizeHelp"
                       placeholder="Enter room size">
                @error('size')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Room Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="priceHelp"
                       placeholder="Enter room price">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" class="form-control" id="description" aria-describedby="descriptionHelp"
                          placeholder="Enter room description"></textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="main_image">Main Room Image</label>
                <input type="file" class="form-control-file" name="main_image" id="main_image">
                @error('main_image')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="room_images">Room Images</label>
                <input type="file" class="form-control-file" name="room_images[]" id="room_images" multiple>
                @error('room_images')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="beds">Room Beds</label>
                <div class="beds-checkboxes">
                    @foreach($beds as $bed)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="beds[]" value="{{ $bed->id }}"
                                   id="bed{{ $bed->id }}">
                            <label class="form-check-label" for="bed{{ $bed->id }}">{{ $bed->name }}</label>
                            <select class="form-control" name="quantity_{{ $bed->id }}">
                                @for ($i = 0; $i <= 5; $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>
                    @endforeach
                </div>
                @error('beds')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="type">Room Type</label>
                <select name="type_id" id="type" class="form-control">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->name }}</option>
                    @endforeach
                </select>
                @error('type_id')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group flexType">
                <label for="services">Room Services</label>
                <div class="services-checkboxes">
                    @foreach($services as $service)
                        <div class="form-check form-check-inline">
                            <input class="form-check input" type="checkbox" name="services[]" value="{{ $service->id }}"
                                   id="service{{ $service->id }}">
                            <label class="form-check
                            -label" for="service{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('services')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
