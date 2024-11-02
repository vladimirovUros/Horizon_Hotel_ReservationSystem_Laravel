@extends('admin.pages.admin')

@section('content')
    <div class="container">
        <h2>Edit room</h2>
        <form action="{{ route('admin.rooms.update', ['room' => $room->id]) }}" method="POST" enctype="multipart/form-data">

        @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Room Name</label>
                <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp"
                       placeholder="Enter room name" value="{{$room->name}}">
                @error('name')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="size">Room Size (square meters)</label>
                <input type="number" name="size" class="form-control" id="size" aria-describedby="sizeHelp"
                       placeholder="Enter room size" value="{{$room->size}}">
                @error('size')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="price">Room Price</label>
                <input type="number" name="price" class="form-control" id="price" aria-describedby="priceHelp"
                       placeholder="Enter room price" value="{{$room->price()->latest()->first()->price}}">
                @error('price')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="description">Room Description</label>
                <textarea name="description" class="form-control" name="description" id="description"
                          aria-describedby="descriptionHelp"
                          placeholder="Enter room description">{{$room->description}}</textarea>
                @error('description')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="main_image">Main Room Image</label>
                <div class="image-preview">
                    @if($room->main_image_path)
                        <img src="{{ asset('assets/img/rooms/' . $room->main_image_path) }}" alt="Main Image" class="img-thumbnail">
                    @else
                        <p>No image uploaded</p>
                    @endif
                </div>
                <input type="file" class="form-control-file" name="main_image_path" id="main_image_path">
                @error('main_image_path')
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
            @foreach($room->images as $image)
                <img src="{{ asset('assets/img/rooms/' . $image->path) }}" alt="{{ $image->name }}"
                     class="img-thumbnail w-25"/>
            @endforeach
            <div class="form-group">
                <label for="beds">Room Beds</label>
                <div class="beds-checkboxes">
                    @foreach($beds as $bed)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="beds[]" value="{{ $bed->id }}"
                                   id="bed{{ $bed->id }}" {{ $room->beds->contains('id', $bed->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="bed{{ $bed->id }}">{{ $bed->name }}</label>
                            @if($room->beds->contains('id', $bed->id))
                                @php
                                    $bedId = $room->beds->where('id', $bed->id)->first()->pivot->bed_id;
                                    $roomId = $room->id;
                                    $quantity = DB::table('room_beds')->where('room_id', $roomId)->where('bed_id', $bedId)->first()->quantity;
                                @endphp
                                <select class="form-control quantity-select" name="quantity_{{ $bed->id }}"
                                        data-id="{{ $bed->id }}">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option
                                            value="{{ $i }}" {{ $i === $quantity ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                                @error('quantity_' . $bed->id)
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            @else
                                <select class="form-control quantity-select" name="quantity_{{ $bed->id }}"
                                        data-id="{{ $bed->id }}">
                                    @for ($i = 0; $i <= 5; $i++)
                                        <option value="{{ $i }}">{{ $i }}</option>
                                    @endfor
                                </select>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            @push('scripts')
                <script>
                    $(document).ready(function () {
                        $('.quantity-select').on('change', function () {
                            var selectedValue = $(this).val();
                            var bedId = $(this).data('id');
                            $('select[name="quantity_' + bedId + '"]').val(selectedValue);
                        });
                    });
                </script>
            @endpush
            <div class="form-group">
                <label for="type">Room Type</label>
                <select name="type" id="type" class="form-control">
                    @foreach($types as $type)
                        @if($type->id === $room->type_id)
                            <option value="{{ $type->id }}" selected>{{ $type->name }}</option>
                        @else
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endif
                    @endforeach
                </select>
                @error('type')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="services">Room Services</label>
                <div class="services-checkboxes">
                    @foreach($services as $service)
                        @php
                            $isChecked = $room->services->contains('id', $service->id) ? 'checked' : '';
                        @endphp
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="services[]" value="{{ $service->id }}"
                                   id="service{{ $service->id }}" {{ $isChecked }}>
                            <label class="form-check-label" for="service{{ $service->id }}">{{ $service->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('services')
                <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
