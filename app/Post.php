<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // è un array che contiene tutti quei campi della tabella che possono essere riempiti usando l'assegnazione di massa.
    //Assegnazione di massa: - significa inviare un array al modello per creare direttamente un nuovo record nel DB.
    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function category(){
        return $this->belongsTo('App\Category');
    }
        // $this è un oggetto della classe tags
    public function tags(){
        return $this->belongsToMany('App\tag');
    }
}
