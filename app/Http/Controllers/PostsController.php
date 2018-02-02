<?php

namespace App\Http\Controllers;

use App\Post;

class PostsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'search']);
    }

    public function index()
    {
        $posts = Post::latest()->paginate(5, ['*'], 'p');

        if (request()->input('p') > $posts->lastPage()) {
            return redirect('/news?p='.$posts->lastPage());
        }

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function search()
    {
        $query = request()->input('q');

        $searchResults = Post::where('title', 'like', '%'.$query.'%')
            ->orWhere('body', 'like', '%'.$query.'%'
            )->paginate(5, ['*'], 'p');
        $searchResults->withPath('/search?q='.$query);

        return view('posts.search', [
            'query'         => $query,
            'searchResults' => $searchResults
        ]);
    }

}
