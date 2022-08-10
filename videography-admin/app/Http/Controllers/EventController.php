<?php

namespace App\Http\Controllers;

use App\Models\EventImage;
use App\Traits\FormHelper;
use domain\Facades\CategoryFacade;
use domain\Facades\EventFacade;
use domain\Facades\PackageFacade;
use Illuminate\Http\Request;

class EventController extends ParentController
{
    use FormHelper;

    public function index()
    {
        $response['events'] = EventFacade::all();
        $response['tc'] = $this;
        return view('Pages.Events.all')->with($response);
    }

    function new()
    {
        $response['categories'] = CategoryFacade::getActive();
        $response['packages'] = PackageFacade::getActive();
        return view('Pages.Events.new')->with($response);
    }

    public function checkSlug(Request $request)
    {
        return EventFacade::checkSlug($request);
    }

    public function store(Request $request)
    {
        $response['event'] = EventFacade::create($request->all());
        $response['alert-success'] = 'Event stored successfully!';
        return redirect()->route('events.edit', $response['event']->id)->with($response);
    }

    public function edit($event_id)
    {
        $response['event'] = EventFacade::find($event_id);
        $response['categories'] = CategoryFacade::getActive();
        $response['packages'] = PackageFacade::getActive();
        return view('Pages.Events.edit')->with($response);
    }

    public function update(Request $request, $event_id)
    {
        EventFacade::update($request->all(), $event_id);
        $response['alert-success'] = 'Event updated successfully!';
        return redirect()->route('events.all')->with($response);
    }

    public function storeImage(Request $request)
    {
        EventFacade::makeImage($request->all());
        $response['alert-success'] = 'Event image stored successfully!';
        return redirect()->back()->with($response);
    }

    public function ImageStatus($image_id, $status)
    {
        if ($status == EventImage::TYPES['PRIMARY']) {
            EventFacade::setPrimary($image_id);
        } else if ($status == EventImage::TYPES['DISABLE']) {
            EventFacade::setDisable($image_id);
        } else if ($status == EventImage::TYPES['ACTIVE']) {
            EventFacade::setActive($image_id);
        }

        $response['alert-success'] = 'Event image status change successfully!';
        return redirect()->back()->with($response);
    }

    public function ImageDelete($image_id)
    {
        EventFacade::deleteImage($image_id);
        $response['alert-success'] = 'Event image delete successfully!';
        return redirect()->back()->with($response);
    }

    public function changeStatus($event_id)
    {
        $status = EventFacade::changeStatus($event_id);

        if ($status == 1) {
            $response['alert-success'] = 'Event Published successfully';
        } else {
            $response['alert-success'] = 'Event Drafted successfully';
        }
        return redirect()->back()->with($response);
    }

    public function delete($event_id)
    {
        EventFacade::delete($event_id);
        $response['alert-success'] = 'Event Deleted successfully!';
        return redirect()->back()->with($response);
    }
}
