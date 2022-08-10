<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\BookingFacade;
use domain\Facades\OrderFacade;
use domain\Facades\ProfitFacade;
use Illuminate\Http\Request;

class HomeController extends ParentController
{
    use FormHelper;

    /**
     * dashboard
     *
     * @return void
     */
    public function index()
    {
        $response['bookingData'] = BookingFacade::chartData();
        $response['popular'] = BookingFacade::popular();
        $response['tc'] = $this;
        return view('Pages.dashboard.index')->with($response);
    }
}
