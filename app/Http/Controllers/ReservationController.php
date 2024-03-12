<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function applyForTheEvent(ReservationRequest $request)
    {
        $validated = $request->validated();
        Event::create($validated);

        return redirect()->back();
    }

    // public function applyForTheEvent(ReservationRequest $request, $eventId)
    // {
    //     $validated = $request->validated();
            
    //     $event = Event::find($eventId);

    //     if ($event && $event->available_seats > 0) {
    //         Reservation::create([
    //             'event_id' => $event->id,
    //         ]);

    //         $event->decrement('available_seats');

    //         return redirect()->back()->with('success', 'Reservation successful!');
    //     } else {
    //         return redirect()->back()->with('error', 'No available seats for this event.');
    //     }
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
        // return redirect()->route('events', $event)->with('success', 'Event reserved!');
    }

    
    // public function generateTicket(Reservation $reservation)
    // {
    //     $event = $reservation->event;

    //     // Customize this part to include more details on the ticket
    //     $ticketDetails = sprintf(
    //         'TICKET-%s-%s-%s-%s',
    //         $event->title,
    //         now()->format('YmdHis'), // Add current date and time for uniqueness
    //         auth()->id(),
    //         $reservation->id // Include reservation ID for reference
    //     );

    //     return $ticketDetails;
    // }


    // public function showTicket(Reservation $reservation)
    // {
    //     // If the reservation doesn't have a ticket, abort with a 404
    //     if (!$reservation->ticket_number) {
    //         abort(404);
    //     }

    //     return view('tickets', compact('reservation'));
    // }

}
