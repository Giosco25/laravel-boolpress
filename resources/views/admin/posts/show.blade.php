@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card" style="width: 18rem;">
                  <div class="card-body">
                    <h3 class="card-title">Titolo: {{ $post->title }}</h3>
                    <p class="card-subtitle mb-2 text-muted">Content: {{ $post->content }}</p>
                    <p class="card-text">Slug: {{ $post->slug }}</p>
                    <p class="card-text">Creato il: {{ $post->created_at }}</p>
                    <p class="card-text">Aggiornato il: {{ $post->updated_at }}</p>
                    <p class="card-text">Categoria: {{ $post->category->name ?? '' }}</p>
                  </div>
                </div>
            </div>
        </div>
    </div>
@endsection
