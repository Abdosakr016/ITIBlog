@extends('navbar')

@section('content')
    <h1 class="mt-2">All Posts</h1>
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Description</th>
            <th>image</th>
            <th>Show</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        @foreach ($posts as $post)
            <tr>
                <td>
                    {{ $post['id'] }}
                </td>
                <td>
                    {{ $post['title'] }}
                </td>
                <td>
                    {{ $post['desc'] }}
                </td>
                <td>
                    <img src="{{ asset('images/' . $post['image']) }}" class="" width="120" alt="...">
                </td>
                <td>
                    <a href="/post/{{ $post['id'] }}" class="btn btn-primary">Show</a>
                </td>
                <td>
                    <a href="" class="btn btn-warning">Update</a>
                </td>
                <td>
                    <a href="" class="btn btn-danger">delete</a>
                </td>
            </tr>
        @endforeach
    </table>
@endsection('content')
@extends('landing.footer')
