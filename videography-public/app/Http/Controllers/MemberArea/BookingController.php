<?php

namespace App\Http\Controllers\MemberArea;

use App\Http\Controllers\Controller;
use domain\Facades\BookingFacade;
use domain\Facades\EventFacade;
use Illuminate\Http\Request;

class BookingController extends ParentController
{
    public function booking()
    {
        $response['events'] = EventFacade::getActive();
        return view('MemberArea.Pages.Booking.index')->with($response);
    }


    public function bookingAll()
    {
        return view('MemberArea.Pages.Orders.index');
    }

    public function bookingView($booking_id)
    {
        $response['booking'] = BookingFacade::get($booking_id);
        return view('MemberArea.Pages.Orders.view')->with($response);
    }

    public function store(Request $request)
    {
        BookingFacade::store($request->all());
        $response['alert-success'] = 'Booking Creation successful!';
        return redirect(route('booking.all'))->with($response);
    }

    public function checkDate(Request $request)
    {
        return BookingFacade::checkDate($request->all());
    }

}

