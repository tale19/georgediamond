<?php

namespace App\Http\Controllers;

use App\Post;
use App\Http\Requests\StorePost;
use Auth;
use Illuminate\Support\Facades\Storage;
use Purifier;
use Image;

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

    public function store(StorePost $request)
    {
        $post = new Post();

        $post->title   = $request->input('title');
        $post->body    = Purifier::clean($request->input('body'));
        $post->user_id = Auth::user()->id;

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = storage_path('app/public/images/news/'.$filename);
            Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            $post->imgname = $filename;
        }

        $post->save();

        return redirect('/news');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(StorePost $request, Post $post)
    {
        $post->title = $request->input('title');
        $post->body  = Purifier::clean($request->input('body'));

        if ($request->hasFile('image')) {
            $image    = $request->file('image');
            $filename = time().'.'.$image->getClientOriginalExtension();
            $location = storage_path('app/public/images/news/'.$filename);
            Image::make($image)->resize(800, null, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($location);
            Storage::delete('public/images/news/'.$post->imgname);
            $post->imgname = $filename;
        }

        $post->save();

        return redirect('/news/'.$post->id);
    }

    public function destroy(Post $post)
    {
        $postid = $post->id;

        Storage::delete('public/images/news/'.$post->imgname);
        $post->delete();

        if (url()->previous() == env('APP_URL').'/news/'.$postid) {
            return redirect('/news');
        }
        return redirect()->back();
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
