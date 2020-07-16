@extends('layouts.dashboard')

@section('content')
    @section('content')
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="d-flex align-items-center">
                        <h1 class="mt-3 mb-3">Nuovo post</h1>
                    </div>
                    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="titolo">Titolo</label>
                            <input type="text" name="title" class="form-control" id="titolo" placeholder="Titolo post" value="{{ old('title') }}">
                        </div>
                        <div class="form-group">
                            <label for="testo">Testo articolo</label>
                            <textarea type="text" name="content" class="form-control" id="testo" placeholder="Testo">{{ old('content') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="immagine">Immagine copertina</label>
                            <input type="file" name="image" class="form-control-file">
                        </div>
                        <div class="form-group">
                            <label for="categoria">Categoria:</label>
                            <select id="categoria" class="form-control" name="category_id">
                                <option value="">Seleziona categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            @foreach ($tags as $tag)
                                <div class="form-check form-check-inline">
                                    <label class="form-check-label">
                                        <input
                                            {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}
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
                            <button type="submit" class="btn btn-primary">Aggiungi</button>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    @endsection
@endsection
