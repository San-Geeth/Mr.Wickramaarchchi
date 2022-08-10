<?php

namespace domain\Services\BookingService;

use App\Models\CustomerEvent;
use App\Models\Event;
use App\Models\Payment;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

class BookingService
{
    public function __construct()
    {
        $this->booking = new CustomerEvent();
        $this->event = new Event();
    }

    public function all()
    {
        return $this->booking->all();
    }

    public function totalCountOfBookings()
    {
        return $this->booking->all()->count();
    }

    public function store($data)
    {
        $event = $this->event->find($data['event_id']);
        $data['total'] = $event->price;
        $data['balance'] = $event->price;
        $data['pay'] = 0;
        $data['date'] = Carbon::parse($data['date'])->format('Y-m-d');
        $this->booking->create($data);
    }

    public function get($booking_id)
    {
        return $this->booking->find($booking_id);
    }

    public function update($booking_id, $data)
    {
        $booking = $this->booking->find($booking_id);
        $booking->update($this->edit($booking, $data));
    }

    protected function edit(CustomerEvent $booking, $data)
    {
        return array_merge($booking->toArray(), $data);
    }

    public function delete($booking_id)
    {
        $booking = $this->booking->find($booking_id);
        $booking->delete();
    }

    public function checkDate($data)
    {
        $events = $this->booking->getByDate($data['date']);
        if($events->count() < 2){
            return 1;
        }else{
            return 0;
        }
    }

    public function approve($booking_id)
    {
        $booking = $this->booking->find($booking_id);
        $booking->status = CustomerEvent::STATUS['APPROVE'];
        $booking->update();
    }

    public function cancel($booking_id)
    {
        $booking = $this->booking->find($booking_id);
        $booking->status = CustomerEvent::STATUS['CANCEL'];
        $booking->update();
    }

    public function done($booking_id)
    {
        $booking = $this->booking->find($booking_id);
        $booking->status = CustomerEvent::STATUS['DONE'];
        $booking->update();
    }

    public function customerBookings($customer_id)
    {
        return $this->booking->customerBookings($customer_id);
    }

    public function chartData()
    {
        return $this->booking->chartData();
    }

    public function popular()
    {
        return $this->booking->popular();
    }



}
