<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');
        $eventsSearch = Event::where('title', 'like', "%$search%")->get();

        return view('searchResult', compact('eventsSearch'));
    }
}
