@extends('admin.pages.admin')
@section('content')
    <h1>All messages</h1>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>FULL_NAME</th>
            <th>EMAIL</th>
            <th>MESSAGE</th>
            <th>ACTIONS</th>
        </tr>
        @foreach($messages as $message)
            <tr>
                <td>{{$message->id}}</td>
                <td>{{$message->full_name}}</td>
                <td>{{$message->email}}</td>
                <td>
                    <div class="description-container">
                        @if(strlen($message->message) > 30)
                            <span class="truncated-description">{{ substr($message->message, 0, 30) }} ...</span>
                            <span class="info-icon" title="{{ $message->message }}">ℹ️</span>
                        @else
                            <span class="truncated-description">{{ $message->message }}</span>
                        @endif
                    </div>
                </td>
                <td>
                    <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this message?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    @if(session()->has("success"))
        <div class="text-success">{{ strtoupper(session("success")) }}</div>
    @endif
    @if(session()->has("error"))
        <div class="text-success">{{ strtoupper(session("error")) }}</div>
    @endif
    {{$messages->links()}}
@endsection
