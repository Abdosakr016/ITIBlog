@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('HELLO USER') }}</div>
                    @can('is_admin')
                        <div class="w-25 mt-4 ms-3">
                            <button class="btn btn-success">Hello Admin</button>
                        </div>
                    @elsecan('is_author')
                        <div class="w-25 mt-4 ms-3">
                            <button class="btn btn-warning text-white">Hello Author</button>
                        </div>
                    @elsecan('is_editor')
                        <div class="w-25 mt-4 ms-3">
                            <button class="btn btn-secondary text-white">Hello Editor</button>
                        </div>
                    @elsecan('is_visitor')
                        <div class="w-25 mt-4 ms-3">
                            <button class="btn btn-danger text-white">Hello Visitor</button>
                        </div>
                    @endcan
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {{ __('You are logged in!') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
