<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'fname' => 'required|string',
            'lname' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|min:11|max:11',
            'property' => 'required|string',
            'inquiring' => 'required|string',
            'communication' => 'nullable|array',
            'notes' => 'nullable|string',
        ]);

        $validated['communication'] = json_encode($request->communication);

        Booking::create($validated);

        return redirect()->back()->with('success', 'Booked successfully!');
    }

    public function index()
    {
        if (!session('admin_logged_in')) {
            return redirect('/admin/login'); // Redirect if not logged in
        }
        // Retrieve all bookings (or use pagination if there are many records)
        $bookings = Booking::all();

        // Pass the bookings to the view
        return view('bookings.index', compact('bookings'));
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return redirect()->back()->with('success', 'Booking deleted successfully.');
    }
}
