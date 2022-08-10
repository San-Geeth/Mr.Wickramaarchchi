<?php

namespace App\Http\Controllers;

use App\Models\CustomerEvent;
use App\Traits\FormHelper;
use domain\Facades\BookingFacade;
use domain\Facades\CustomerFacade;
use domain\Facades\EventFacade;
use Illuminate\Http\Request;

class BookingController extends ParentController
{
    use FormHelper;

    public function index()
    {
        $response['bookings'] = BookingFacade::all();
        $response['tc'] = $this;
        return view('Pages.Bookings.all')->with($response);
    }

    public function view($booking_id)
    {
        $response['booking'] = BookingFacade::get($booking_id);
        $response['tc'] = $this;
        return view('Pages.Bookings.view')->with($response);
    }

    public function delete($booking_id)
    {
        BookingFacade::delete($booking_id);
        $response['alert-success'] = 'Booking Deleted successfully!';
        return redirect()->back()->with($response);
    }

    public function status($booking_id, $status)
    {
        if ($status == CustomerEvent::STATUS['APPROVE']) {
            BookingFacade::approve($booking_id);
        } else if ($status == CustomerEvent::STATUS['CANCEL']) {
            BookingFacade::cancel($booking_id);
        } else if ($status == CustomerEvent::STATUS['DONE']) {
            BookingFacade::done($booking_id);
        }


        $response['alert-success'] = 'Booking Status Change successfully!';
        return redirect()->back()->with($response);
    }

    public function new()
    {
        $response['customers'] = CustomerFacade::all();
        $response['events'] = EventFacade::getActive();
        $response['tc'] = $this;
        return view('Pages.Bookings.new')->with($response);
    }

    public function store(Request $request)
    {
        BookingFacade::store($request->all());
        $response['alert-success'] = 'Booking Creation successful!';
        return redirect(route('booking.all'))->with($response);
    }

    public function edit($booking_id)
    {
        $response['events'] = EventFacade::getActive();
        $response['customers'] = CustomerFacade::all();
        $response['booking'] = BookingFacade::get($booking_id);
        $response['tc'] = $this;
        return view('Pages.Bookings.edit')->with($response);
    }

    public function update(Request $request,$booking_id)
    {
        BookingFacade::update($booking_id, $request->all());
        $response['alert-success'] = 'Booking Updated Successful!';
        return redirect()->route('booking.all')->with($response);
    }

    public function checkDate(Request $request)
    {
        return BookingFacade::checkDate($request->all());
    }
}
