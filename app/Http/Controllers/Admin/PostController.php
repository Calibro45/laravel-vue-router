<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //todo recupera i dati

        $posts = Post::limit(50)
            ->orderBy('published_at', 'desc')
            ->get();

        // ritorna la vista posts.index

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // ritorna la vista del form

        return view('admin.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validation

        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today'
        ]);

        // rechiesta

        $data = $request->all();

        // creazione slug 

        $slug = Str::slug($data['title']);
        $slugBase = $slug;
        $counter = 1;
        
        $post_present = Post::where('slug', $slug)->first();

        // controllo slug esiste

        while ($post_present) {

            $slug = $slugBase . '-' . $counter;
            $counter++;
            $post_present = Post::where('slug', $slug)->first();
        };

        $post = new Post();
        $post->fill($data);
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');

        //dump($data, $slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
