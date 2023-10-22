@extends('navbar')
@section('posts')
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
    <form action="{{ route('DB-post.store') }}" enctype="multipart/image" method="post">
        @csrf()
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Title</label>
            <input type="text" name="title" value="{{ old('title') }}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('title')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post description</label>
            <input type="text" name="description" value="{{ old('description') }}" class="form-control"
                id="exampleInputPassword1">
            @error('description')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post image</label>
            <label for="image" class="form-label"></label>
            <input class="form-control" name="image" value="{{ old('image') }}" type="file" id="image">
            @error('image')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post Category</label>
            <select name="category_id" class="form-select" aria-label="Default select example">
                <option selected>Open this select menu</option>
                @foreach ($data as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection('posts')
