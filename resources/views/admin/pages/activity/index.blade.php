@extends('admin.pages.admin')
@section('content')
    <h1>Activities</h1>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>USER_ID</th>
            <th>IP_ADDRESS</th>
            <th>ACTIVITY</th>
            <th>PATH</th>
            <th>CREATED_AT</th>
        </tr>
        @foreach($activities as $activity)
            <tr>
                <td>{{$activity->id}}</td>
                <td>{{$activity->user_id}}</td>
                <td>{{$activity->ip_address}}</td>
                <td>{{$activity->activity}}</td>
                <td>{{$activity->path}}</td>
                <td>{{$activity->created_at}}</td>
            </tr>
        @endforeach
    </table>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-danger">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$activities->links()}}
@endsection
