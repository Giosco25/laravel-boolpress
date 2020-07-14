@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-75 col-12">
            <div class="card-body">
                <h1 class="card-title">{{ $post->title }}</h1>
                <p class="card-title">{{ $post->content }}</p>
                <p>Categoria: {{ $post->category->name ?? '-' }}</p>
            </div>

        </div>
    </div>
</div>
@endsection
