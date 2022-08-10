<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use domain\Facades\SettingFacade;
use domain\Facades\VisitorRequestFacade;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function contact()
    {
        return view('PublicArea.Pages.Contact.index');
    }

    /**
     * Store visitor request
     *
     * @param ContactUsRequest $request Contact ud details
     *
     * @return void
     */
    public function store(Request $request)
    {
        VisitorRequestFacade::store($request->all());
        $response['alert-success'] = 'Message Sent Successfully';
        return redirect(route('contact'))->with($response);
    }
}
