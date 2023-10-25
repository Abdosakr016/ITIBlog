@extends('navbar')
@section('post')
    <div class="card mb-3 mt-5 w-25">
        <img src="{{ asset('images/' . $data['image']) }}" height="250" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title">{{ $data['title'] }}</h5>
            <p class="card-text">{{ $data['description'] }}</p>
            <h6 class="card-text">category: <a href="{{ route('category.show', $data->category->id) }}">
                    {{ $data->category->name }}</a></h6>
            <h6 class="card-text">User: <a href="">
                    {{ $data->user->name }}</a></h6>
            <a href="/post" class="btn btn-primary">Back</a>
        </div>
        <div class="card-footer"><small class="text-body-secondary">{{ $data['updated_at'] }}</small></div>
    </div>
@endsection('post')
