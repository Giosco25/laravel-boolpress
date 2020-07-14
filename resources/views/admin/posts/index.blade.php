@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h1>Post</h1>
                    <a class="btn btn-info"
                    href="{{ route('admin.posts.create') }}">
                        Nuovo post
                    </a>
                </div>
            </div>
        </div>

    </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Title</th>
          <th scope="col">Slug</th>
          <th scope="col">Category</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
          @foreach ($posts as $post)
              <tr>
                  <td>{{ $post->id }}</td>
                  <td>{{ $post->title }}</td>
                  <td>{{ $post->slug }}</td>
                  <td>{{ $post->category->name ?? '' }}</td>
                  <td>
                      <a class="btn btn-secondary btn-sm"
                      href="{{ route('admin.posts.show', ['post'=>$post->id]) }}">
                          Dettagli
                      </a>
                      <a class="btn btn-success btn-sm" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                          Modifica
                      </a>
                      <form class="d-inline" action="{{ route('admin.posts.destroy', ['post' => $post->id]) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <input type="submit" class="btn btn-small btn-info btn-sm" value="Elimina">
                      </form>
                  </td>
              </tr>
          @endforeach
      </tbody>

    </table>
@endsection
