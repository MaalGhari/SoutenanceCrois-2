<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function generate(Request $request)
    {
        $user_id = Auth::user()->id;
        $user = User::find($user_id);        
        $event = Reservation::with('event_id')->where('user_id', $user_id)->get();
        $dateTime = Reservation::where('user_id', $user_id)->get();
        $ticket_number = Reservation::with('ticket_number')->where('user_id', $user_id)->get();

        $pdf = Pdf::loadView('invoice', compact('user', 'event', 'dateTime', 'ticket_number'));
        # Option 1) Show the PDF in the browser
        // return $pdf->stream();

        # Option 2) Download the PDF
        return $pdf->download('invoice.pdf');
    }
}
