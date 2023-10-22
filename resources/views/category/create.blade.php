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
    <form action="{{ route('category.store') }}" enctype="multipart/image" method="post">
        @csrf()
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Post Title</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            @error('name')
                <div class="text-danger">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Post description</label>
            <input type="text" name="category" value="{{ old('category') }}" class="form-control"
                id="exampleInputPassword1">
            @error('category')
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
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection('posts')
