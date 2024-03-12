<?php

namespace App\Http\Controllers;

use App\Http\Requests\EventRequest;
use App\Models\Category;
use App\Models\CategoryEvent;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function myEvents()
    {
        $organiserId = Auth::user()->id;
        $events = Event::where('organiser_id', $organiserId)->orderBy('updated_at', 'desc')->paginate(4);

        return view('events', compact('events'));
    }

    public function displayEvents(Request $request)
    {
        // $events = Event::with('users')->where('status', 'Available')->where('validation', 'Validated')->get();
        $events = Event::with('users')->where('status', 'Available')->where('validation', 'Validated')->paginate(4);

        $categoryId = $request->input('category_id');
        
        $events = Event::with('users')
            ->where('status', 'Available')
            ->where('validation', 'Validated');

        if ($categoryId) {
            $events->where('category_id', $categoryId);
        }

        $events = $events->paginate(4);

        $categories = Category::all();

        return view('events', compact('events', 'categories'));
    }
    
    public function createEvents()
    {
        $organiser = Auth::user()->id;
        $categories = Category::all();

        return view('organiser.createEvent', compact('organiser', 'categories'));
 
    }

    public function store(EventRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);

        return redirect()->route('organiser.organiser_dashboard');
    }

    public function updateEvents($id)
    {
        $events = Event::where('id', $id)->get();
        $categories = Category::all();

        return view('organiser.updateEvent', compact('events', 'categories'));
    }

    public function update(EventRequest $request, $id)
    {
        $validated = $request->validated();
        $updateEvent = Event::where('id', $id);
        $updateEvent->update($validated);

        return redirect()->route('organiser.organiser_dashboard'); 
    }

    public function deleteEvent($id)
    {
        $events = Event::where('id', $id);
        $events->delete();

        return redirect()->back();
    }

    public function eventsDetails($id)
    {
        $events = Event::with('users')->with('categories')->where('id', $id)->get();

        return view('eventsDetails', compact('events'));
    }

    public function validationEvents()
    {
        $events = Event::where('validation', 'Unvalidated')->get();

        return view('accesEvents', compact('events'));
    }

    public function validatedEvent($id)
    {
        $events = Event::where('id', $id);
        $events->update([
            'validation' => 'Validated',
        ]);

        return redirect()->back();
    }

    public function unvalidatedEvent($id)
    {
        $events = Event::where('id', $id);
        $events->update([
            'validation' => 'Unvalidated',
        ]);

        return redirect()->back();
    }

    public function filterByCategory(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        $events = Event::with('users')
            ->where('status', 'Available')
            ->where('validation', 'Validated');

        if ($categoryId) {
            $events->where('category_id', $categoryId);
        }

        $events = $events->paginate(4);

        $categories = Category::all();

        return view('events', compact('events', 'categories'));
   }

}
