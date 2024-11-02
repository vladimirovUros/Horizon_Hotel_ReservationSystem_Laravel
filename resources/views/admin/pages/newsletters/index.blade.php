@extends('admin.pages.admin')
@section('content')
    <h1>All newsletters</h1>
    <table class="table table-striped">
        <tr>
            <th>#ID</th>
            <th>EMAIL</th>
            <th>CREATED AT</th>
            <th>ACTIONS</th>
        </tr>
        @foreach($newsletters as $newsletter)
            <tr>
                <td>{{$newsletter->id}}</td>
                <td>{{$newsletter->email}}</td>
                <td>{{$newsletter->created_at}}</td>
                <td>
                    <form action="{{ route('admin.newsletters.destroy', $newsletter->id) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this newsletter?')">Delete</button>
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
    {{$newsletters->links()}}
@endsection
