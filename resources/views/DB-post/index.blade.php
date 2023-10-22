@extends('navbar')

@section('content')
<a href="{{route('DB-post.create')}}" class="btn btn-primary p-2">Create New Post</a>
<div class="row row-cols-1 row-cols-md-3 g-4 mt-2">
  @foreach($data as $post)
  <div class="col">
    <div class="card">
      <img src="{{asset('images/' .$post['image'])}}" class="card-img-top" height="220" alt="...">
      <div class="card-body">
        <h5 class="card-title">{{$post['title']}}</h5>
        <p class="card-text">{{$post['description']}}</p>
        <a href="{{route('DB-post.show', $post['id'])}}" class="btn btn-primary">show</a>
        <a href="{{route('DB-post.edit', $post['id'])}}" class="btn btn-warning">edit</a>
        <!-- <a href="{{route('DB-post.delete', $post['id'])}}" class="btn btn-danger">delete</a> -->
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
          delete
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                Are You sure for Delete this Post !
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn"> <a href="{{route('DB-post.delete', $post['id'])}}" class="btn btn-danger">delete</a>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card-footer">
        <small class="text-body-secondary">{{$post['updated_at']}}</small>
      </div>
    </div>
  </div>
  @endforeach
</div>
{{$data}}

@endsection('content')