<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // public function applyForTheEvent(ReservationRequest $request)
    // {
    //     $validated = $request->validated();
    //     Event::create($validated);

    //     return redirect()->back();
    // }


    public function apply($id)
    {
        $user_id = Auth::user()->id;
        $events = Event::where('id', $id)->get();
        $ticket_number = mt_rand(1000, 9999);
        foreach($events as $event){
            // dd($event->acceptance);
            if($event->acceptance == 'Automatic acceptance'){
                Reservation::create([
                    'user_id' => $user_id,
                    'event_id' => $id,
                    'status' => 'Confirmed',
                    'ticket_number' => $ticket_number,
                ]);

                $event->available_seats = $event->available_seats - 1;
                $event->save();
                
                return redirect()->back();
            }else{
                Reservation::create([
                    'user_id' => $user_id,
                    'event_id' => $id,
                    'status' => 'Awaiting',
                    'ticket_number' => $ticket_number,
                ]);
                return redirect()->back();
            }
        }

        return redirect()->back();
    }

    public function generateTicket(Reservation $reservation)
    {
        $event = $reservation->event;

        // Customize this part to include more details on the ticket
        $ticketDetails = sprintf(
            'TICKET-%s-%s-%s-%s',
            $event->title,
            now()->format('YmdHis'), // Add current date and time for uniqueness
            auth()->id(),
            $reservation->id // Include reservation ID for reference
        );

        return $ticketDetails;
    }


    public function showTicket(Request $request)
    {
        // If the reservation doesn't have a ticket, abort with a 404

        $currentUser = Auth::id();
        $reservations = Reservation::where('user_id', $currentUser)->where('event_id', $request->eventId)->get();

        if (!$reservations) {
            abort(404);
        }

        return view('tickets', compact('reservations'));
    }

}
