@extends('admin.pages.admin')
@section('content')
    <h1>All reservations</h1>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>ROOM</th>
            <th>FULL_NAME</th>
            <th>PRICE</th>
            <th>PHONE</th>
            <th>NO.PEOPLE</th>
            <th>CHECK_IN</th>
            <th>CHECK_OUT</th>
            <th>DELETE</th>
        </tr>
        @foreach($reservations as $reservation)
            <tr>
                <td>{{$reservation->id}}</td>
                <td>{{$reservation->room->name}}</td>
                <td>{{$reservation->full_name}}</td>
                <td>{{$reservation->price}}</td>
                <td>{{$reservation->phone}}</td>
                <td>{{$reservation->no_of_people}}</td>
                <td>{{$reservation->check_in}}</td>
                <td>{{$reservation->check_out}}</td>
                <td>
                    <form action="{{ route('admin.reservations.destroy', $reservation->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to cancel this reservations?')">CANCEL</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-danger">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$reservations->links()}}
@endsection
