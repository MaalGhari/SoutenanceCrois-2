<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function admin_dashboard()
    {
        $totalUsers = User::count();
        $totalCategories = Category::count();
        $totalEvents = Event::where('validation', 'validated')->count();
        $totalReservations = Reservation::count();
        return view('admin.admin_dashboard', compact('totalUsers', 'totalCategories', 'totalEvents', 'totalReservations'));

    }
}




































// $admin = Auth::user()->id;
        // $users = User::all();
        // $events = Event::where('status', 'Available')->where('validation', 'Validated')->get();
        
        // foreach ($users as $user){
        //     $totalUsers = $user->count();
        // }
        
        // foreach ($events as $event) {
        //     $reservationsCount = Reservation::where('event_id', $event->id)->count();
        //     // dd($reservationsCount);
        //     foreach ($reservationsCount as $reservationCount){
        //         $total = $event->available_seats - $reservationCount;
        //     }
        //     $totalEvents = $event->count();
        //     $totalReservations = $event->reservations()->count();
        //     $confirmedReservations = $event->reservations()->where('status', 'Confirmed')->count();
        // }
        // dd($totalReservations);

        // return view('admin.admin_dashboard', compact('totalUsers', 'totalEvents', 'totalReservations', 'confirmedReservations'));