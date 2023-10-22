@extends('navbar')
@section('post')
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"> {{ $post['title'] }}</h5>
            <p class="card-text"> {{ $post['desc'] }}</p>
            <a href="/posts" class="btn btn-primary">Back</a>
        </div>
    </div>
@endsection('post')
@extends('landing.footer')
