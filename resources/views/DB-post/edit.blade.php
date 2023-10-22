@extends('navbar')
@section('posts')
    <h1 class="text-center">Edit Your post</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('DB-post.update', $data['id']) }}" method="POST" enctype="multipart/image">
        @method('PUT')
        @csrf()
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Title</label>
            <input type="text" value="{{ old('title', $data->title) }}" name="title" class="form-control"
                id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post description</label>
            <input type="text" value="{{ old('description', $data->description) }}" name="description"
                class="form-control" id="exampleInputPassword1">
        </div>
        @error('description')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post image</label>
            <label for="image" value="{{ old('image', $data->image) }}" class="form-label"></label>
            <input class="form-control" name="image" type="file" id="image">
        </div>
        @error('image')
            <div class="text-danger">
                {{ $message }}
            </div>
        @enderror
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection('posts')
