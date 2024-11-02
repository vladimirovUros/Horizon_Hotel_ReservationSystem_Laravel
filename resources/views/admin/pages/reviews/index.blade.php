@extends('admin.pages.admin')
@section('content')
    <h1>All reviews</h1>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>USER</th>
            <th>ROOM</th>
            <th>REVIEW</th>
            <th>RATING</th>
            <th>CREATED AT</th>
        </tr>
        @foreach($reviews as $review)
            <tr>
                <td>{{$review->id}}</td>
                <td>{{$review->user->full_name}}</td>
                <td>{{$review->room->name}}</td>
                <td>
                    @if(strlen($review->comment) > 35)
                        <span class="truncated-description">{{substr($review->comment, 0, 35)}} ...</span>
                        <span class="info-icon" title="{{$review->comment}}">ℹ️</span>
                    @else
                        {{$review->comment}}
                    @endif
                </td>

                <td>
                    @php
                        $stars = '';
                        for ($i = 1; $i <= $review->rating; $i++) {
                            $stars .= '<i class="fas fa-star"></i>';
                        }
                        echo $stars;
                    @endphp
                </td>

                <td>{{$review->created_at}}</td>S
            </tr>
        @endforeach
    </table>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-danger">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$reviews->links()}}
@endsection
