<?php

namespace App\Http\Controllers;

use App\Show;
use App\Video;

class ShowsController extends Controller
{

    public function index()
    {
        $shows = Show::all();

        return view('shows.index', [
            'shows' => $shows
        ]);
    }

    public function videos()
    {
        $show = \request('show');

        $videos = Video::where('show_id', $show)->get();

        return $videos;
    }

}
