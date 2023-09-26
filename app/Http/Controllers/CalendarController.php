<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class CalendarController extends Controller
{
    public function index()
    {
        $bookEvents = Booking::all();

        return view('dashboard.calendar', compact('bookEvents'));
    }

    public function bookPost(Request $request)
    {
        $car_plate = $request->get('car_plate');
        $phone = $request->get('phone');
        $service = $request->get('subject');
        $date = $request->get('date');
        $selectedHour = $request->get('selectFreeHour');
        $formatData = explode('/', $date);
        $newData = $formatData[1].'-'.$formatData[0].'-'.$formatData[2];

        Booking::create([
            'car_plate' => $car_plate,
            'phone' => $phone,
            'service' => $service,
            'status' => '0',
            'day' => $newData,
            'hour' => $selectedHour

        ]);

        return back()->with('success', 'Резервацията е направена успешно!');
    }
}