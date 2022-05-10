<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['category', 'tags'])
            ->where('published_at', '!=', 'null')
            ->paginate(12);

        return response()
            ->json([
                'posts' => $posts,
                'succes' => true
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        // query per recupero post da fare la show
        $post = Post::with(['category', 'tags'])
            ->where('slug', $slug)
            ->first();
        //dd($post->published_at);

        $publishDate = $post->published_at;
        //dd($publishDate);

        // controllo se post esiste
        if($post && $publishDate) {
            // return dati in json
            return response()
                ->json([
                    'post' => $post,
                    'succes' => true
                ]);
        }

        // ritorno post non trovato
        return response()
            ->json([
                'message' => 'post non trovato o non pubblicato',
                'succes' => false
            ], 404);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
