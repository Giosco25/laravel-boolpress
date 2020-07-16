<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Tag;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $tags  = Tag::all();
        // si usa data per mettere più cose e poi inserirlo dentro view
        // N.B si può mettere tags direttamente su compact('posts','tags')
        $data = [
            'posts'=>$posts,
            'tags'=>$tags
        ];
        return view('admin.posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags  = Tag::all();
        return view('admin.posts.create', compact('categories', 'tags'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // richiesta di validità
        $request->validate([
            'title' => 'required|max:200|unique:posts,title',
            'content' => 'required',
            // 'image' =>  'image|max:1024'
        ]);
        // richiediamo tutti i dati
        $dati = $request->all();

        $slug = Str::of($dati['title'])->slug('-')->__tostring();
        $dati['slug'] = $slug;

        $img_path = Storage::put('uploads', $dati['image']);
        dd($img_path);
        // $dati['cover_image'] = $img_path;
        // creiamo un nuovo Post
        $nuovo_post = new Post();
        // fill compila i dati e va sempre con save
        $nuovo_post->fill($dati);
        $nuovo_post->save();
        // se i dati che abbiamo dei tags non è vuoto esegue altrimenti torna alla pagina iniziale
        if (!empty($dati['tags'])) {
            // sync permette di passare un array e fa sia attach che detach contemporaneamente cioè attacch salvare dei record, detach eliminare i record
            $nuovo_post->tags()->sync($dati['tags']);
        }

        return redirect()->route('admin.posts.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();
        $tags  = Tag::all();
        $data = [
            "post" =>$post,
            "categories"=> $categories,
            "tags"=> $tags
        ];
        return view('admin.posts.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        {
            $request->validate([
                'title' => 'required|max:255|unique:posts,title,'.$id,
                'content' => 'required'
            ]);

            $dati = $request->all();
            $slug = Str::of($dati['title'])->slug('-');
            $dati['slug'] = $slug;
            // Agisce sulla chiave primaria e prende un post con tutte le sue caratteristiche
            $post = Post::find($id);
            $post->update($dati);
            if (!empty($dati['tags'])) {
                $post->tags()->sync($dati['tags']);
            }
            return redirect()->route('admin.posts.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
