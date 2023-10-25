@extends('navbar')

@section('content')
    <h1 class="text-center">categorys</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary p-2">Create New Post</a>

    <div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
        @foreach ($data as $category)
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <small class="text-body-secondary">Created at: {{ $category['created_at'] }}</small>
                    </div>
                    <img src="{{ asset('images/uploads/' . $category['image']) }}" class="" height="220"
                        alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category['name'] }}</h5>
                        <p class="card-text">{{ $category['category'] }}</p>
                        <a href="{{ route('category.show', $category) }}" class="btn btn-primary">show</a>
                        @can('is_admin')
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">edit</a>
                        @elsecan('is_author')
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">edit</a>
                        @elsecan('is_editor')
                            <a href="{{ route('category.edit', $category) }}" class="btn btn-warning">edit</a>
                        @endcan
                        @can('is_admin')
                            <form method="post" action="{{ route('category.destroy', $category->id) }}" class="d-inline">
                                @method('delete')
                                @csrf()
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @elsecan('is_author')
                            <form method="post" action="{{ route('category.destroy', $category->id) }}" class="d-inline">
                                @method('delete')
                                @csrf()
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        @endcan
                        <!-- Button trigger modal -->
                        {{-- <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            delete
                        </button> --}}

                        <!-- Modal -->
                        {{-- <form method="post" action="{{ route('category.destroy', $category->id) }}">
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are You sure for Delete this category !
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            @method('delete')
                                            @csrf
                                            <input type="submit" class="btn btn-danger">
                                            delete
                        </form> --}}


                    </div>
                    <div class="card-footer">
                        <small class="text-body-secondary">Updated at: {{ $category['updated_at'] }}</small>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="mt-4">
        <div class="row">
            <div class="justify-content-center d-flex">
                {{ $data }}

            </div>
        </div>
    </div>
@endsection('content')
