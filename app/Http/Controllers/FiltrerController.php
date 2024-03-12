<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class FiltrerController extends Controller
{
    // public function filtration(Request $request)
    // {
    //     // dd($request->all());
    //     $categories = Category::all();
    //     // $events = Event::with('users')->where('status', 'Available')->where('validation', 'Validated')->get();
    //     $query = Event::query();

    //     if(isset($request->title) && notNullValue($request->title))
    //     {
    //         $query->where('title', $request->title);
    //     }

    //     $events = $query->get();

    // return view('filtration', compact('categories', 'events'));
    // }
}
