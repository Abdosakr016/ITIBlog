@extends('navbar')
@section('post')
    <div class="card mb-3">
        <img src="{{ asset('images/' . $data['image']) }}" height="450" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $data['name'] }}</h5>
            <p class="card-text">{{ $data['category'] }}</p>
            <ul>
                @foreach ($data->posts as $post)
                    <li><a href="{{ route('DB-post.show', $post->id) }}">{{ $post->title }}</a></li>
                @endforeach
            </ul>
            <a href="/post" class="btn btn-primary mb-2">Back</a>
        </div>
        <div class="card-footer"><small class="text-body-secondary">{{ $data['updated_at'] }}</small></div>
    </div>
@endsection('post')
