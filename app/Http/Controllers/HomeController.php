<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Show;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.home');
    }

    public function shows()
    {
        $shows = Show::all();
        return view('admin.shows', [
            'shows' => $shows
        ]);
    }

    public function posts()
    {
        return view('admin.posts');
    }
}
