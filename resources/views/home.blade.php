@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Benvenuto</h1>
            <a class="btn btn-secondary"
            href="{{ route('posts.index') }}">
                Vai ai post
            </a>
        </div>
    </div>
</div>
@endsection
