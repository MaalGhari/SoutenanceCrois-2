<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrganiserController extends Controller
{
    public function organiser_dashboard()
    {
        $organiser = Auth::user()->id;
        $events = Event::with('users')->where('organiser_id', $organiser)->orderBy('updated_at', 'desc')->get();

        return view('organiser.organiser_dashboard', compact('organiser', 'events'));
    }
}








































// public function organiser_dashboard()
    // {
    //     $organiser = Auth::user()->id;
    //     $event = Event::with('users')->where('organiser_id', $organiser)->orderBy('updated_at', 'desc')->get();
    //     $events = Event::all();

    //     foreach ($events as $event) {

    //         $totalReservations = $event->reservations()->count();
    //         $confirmedReservations = $event->reservations()->where('status', 'Confirmed')->count();

    //     }
    //     return view('organiser.organiser_dashboard', compact('organiser', 'event', 'events', 'totalReservations', 'confirmedReservations'));

    // }