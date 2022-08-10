<?php

namespace App\Traits;

use App\Models\CustomerEvent;
use Illuminate\Support\Str;
use Carbon\Carbon;
use domain\Facades\BookingFacade;
use domain\Facades\EventFacade;
use domain\Facades\ProfitFacade;
use domain\Facades\VisitorRequestFacade;

trait FormHelper
{
    /**
     * check image and return
     *
     * @param  mixed $images
     * @return void
     */
    public function allImage($images)
    {
        if ($images) {
            return '<img src=' . config('images.access_path') . '/thumb/35x35/' . $images->name . '>';
        } else {
            return '<img src=' . asset('img/no.jpg') . ' width="50px">';
        }
    }

    public function allImageCrop($images)
    {
        if ($images) {
            return '<img src=' . config('images.access_path') . '/crop/' . $images->name . ' width="100px">';
        } else {
            return '<img src=' . asset('img/no.jpg') . ' width="50px">';
        }
    }

    /**
     * get status badge
     *
     * @param  mixed $status
     * @return void
     */
    public function getStatus($status)
    {
        if ($status == 1) {
            return  '<span class="badge badge-success">Published</span>';
        } else {
            return  '<span class="badge badge-danger">Drafted</span>';
        }
    }

    public function getBookingStatus($status)
    {
        switch ($status) {
            case CustomerEvent::STATUS['PENDING']:
                return  '<span class="badge bg-pending" style=""> <i class="fas fa-clock-o"></i> Pending</span>';
                break;
            case CustomerEvent::STATUS['APPROVE']:
                return  '<span class="badge bg-paid"><i class="fas fa-money-bill-wave"></i> Approve</span>';
                break;
            case CustomerEvent::STATUS['CANCEL']:
                return  '<span class="badge bg-shipping"><i class="fas fa-shopping-cart"></i> Cancel</span>';
                break;
            case CustomerEvent::STATUS['DONE']:
                return  '<span class="badge bg-shipping"><i class="fas fa-shopping-cart"></i> Complete</span>';
                break;
        }
    }

    /**
     * limit String
     *
     * @param  mixed $str
     * @return void
     */
    public function limitStr($str, $limit)
    {
        return Str::limit($str ? $str : '', $limit);
    }

    /**
     * price format change to show decimal
     *
     * @param  mixed $price
     * @return void
     */
    public function priceFormat($price)
    {
        return number_format($price ? $price : 0, 2);
    }

    /**
     * number Format
     *
     * @param  mixed $number
     * @return void
     */
    public function numberFormat($number)
    {
        return number_format($number ? $number : 0);
    }

    public function customerBookings($customer_id)
    {
        return BookingFacade::customerBookings($customer_id);
    }

    public function totalCountOfBookings()
    {
        return BookingFacade::totalCountOfBookings();
    }

    public function totalCountOfEvents()
    {
        return EventFacade::totalCountOfEvents();
    }



    public function totalCountOfUnreadVisitorRequests()
    {
        return VisitorRequestFacade::totalCountOfUnreadVisitorRequests();
    }
}
