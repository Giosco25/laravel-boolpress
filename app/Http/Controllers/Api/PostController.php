<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post;

class PostController extends Controller
{
    public function index(){

        // Il metodo map applica una determinata funzione di callback a ciascun elemento di una raccolta. La funzione di callback modificherà l'elemento e creerà una nuova raccolta Laravel.
        // Il metodo map non modificherà la raccolta originale, ma restituirà una nuova raccolta con tutte le modifiche.
        // questo mi ritorna solo quello che ho messo dentro only
        $posts= Post::all()->map->only('id','title','content');
        return response()->json(['post'=>$posts]);


        //**** questo mi ritorna tutti posti in json completi   *****//
        // $posts= Post::all();
        // return response()->json(['post'=>$posts]);
    }
}
