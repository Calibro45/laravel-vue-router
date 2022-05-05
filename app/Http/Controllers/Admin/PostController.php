<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filtro = ($request->input('filter'));

        if(isset($filtro)) {
            $posts = Post::with(['category', 'tags'])
                ->orderBy($filtro, 'asc')
                ->limit(50)
                ->get();
        } else {
            // data
    
            $posts = Post::with(['category', 'tags'])
                ->orderBy('created_at', 'desc')
                ->limit(50)
                ->get();
            }
        //dd($posts);
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
        // categories data
        $categories = Category::orderBy('name', 'asc')
            ->get();

        // ritorna la vista del form
        return view('admin.posts.create', compact('categories'));
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
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' => 'nullable|exists:categories,id|numeric'
        ]);

        // rechiesta

        $data = $request->all();

        $slug = Post::getUniqueSlug($data['title']);

        $post = new Post();
        $post->fill($data);
        $post->slug = $slug;

        $post->save();

        return redirect()->route('admin.posts.index');

        //dump($data, $slug);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        // categories data
        $categories = Category::orderBy('name', 'asc')
            ->get();

        //tags data
        $tags = Tag::orderBy('name', 'asc')
            ->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        // validation

        $request->validate([
            'title' => 'required|string|max:150',
            'content' => 'required|string',
            'published_at' => 'nullable|date|before_or_equal:today',
            'category_id' => 'nullable|exists:categories,id|numeric',
            'tags' => 'exists:tags,id'
        ]);
        
        // request

        $data = $request->all();

        if ($post->title != $data['title']) {
            
            $slug = Post::getUniqueSlug($data['title']);
            $data['slug'] = $slug;
        }

        // if tags keys exist sync tag to post

        $post->checkTagKey('tags', $data);

        //dd($data);
        
        $post->update($data);

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // delete

        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
