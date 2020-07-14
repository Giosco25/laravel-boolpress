@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h1>Post</h1>
            <ul class="list-group list-group-flush">
                @foreach ($posts as $post)
                    <li class="list-group-item">
                        <a href="{{ route('posts.show', ['slug' => $post->slug]) }}">
                            {{ $post->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection
