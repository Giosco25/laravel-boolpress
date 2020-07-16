@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="d-flex align-items-center">
                    <h1 class="mt-3 mb-3">Modifica post</h1>
                </div>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="titolo">Titolo</label>
                        <input type="text" name="title" class="form-control" id="titolo" placeholder="Titolo post" value="{{ old('title', $post->title) }}">
                    </div>
                    <div class="form-group">
                        <label for="testo">Testo articolo</label>
                        {{-- old si usa quando non si compila un input così quando riavviamo la pagina resta sempre quello che si era scritto precedentemente  --}}
                        <textarea type="text" name="content" class="form-control" id="testo" placeholder="Scrivi qualcosa">{{ old('content', $post->content) }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria:</label>
                        <select id="categoria" class="form-control" name="category_id">
                            <option value="">Seleziona categoria</option>
                            @foreach ($categories as $category)
                                <option {{ $post->category == $category ? 'selected' : "" }}  value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        @foreach ($tags as $tag)
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input
                                    {{-- si usa contains per far sì che durante la modifica resta in ascolto della precedente selezione del tag --}}
                                        {{ $post->tags->contains($tag) ? 'checked' : '' }}
                                        class="form-check-input"
                                        name="tags[]"
                                        type="checkbox"
                                        value="{{ $tag->id }}">
                                    {{ $tag->name }}
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary">Salva</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
