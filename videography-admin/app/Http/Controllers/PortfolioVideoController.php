<?php

namespace App\Http\Controllers;

use App\Traits\FormHelper;
use domain\Facades\CategoryFacade;
use domain\Facades\PortfolioVideoFacade;
use Illuminate\Http\Request;

class PortfolioVideoController extends Controller
{
    use FormHelper;


    public function index(Request $request)
    {
        $response['videos'] = PortfolioVideoFacade::all();
        $response['categories'] = CategoryFacade::all();
        $response['tc'] = $this;
        return view('Pages.Portfolios-Video.all')->with($response);
    }

    public function store(Request $request)
    {
        PortfolioVideoFacade::create($request->all());
        $response['alert-success'] = 'video Created Successfully';
        return redirect()->route('portfolios.video.all')->with($response);
    }

    public function edit(Request $request)
    {
        $response['video'] = PortfolioVideoFacade::get($request['video_id']);
        $response['categories'] = CategoryFacade::all();
        $response['tc'] = $this;
        return view('Pages.Portfolios-Video.edit')->with($response);
    }

    public function update(Request $request, $video_id)
    {
        PortfolioVideoFacade::update($request->all(), $video_id);
        $response['alert-success'] = 'video Updated Successfully';
        return redirect()->route('portfolios.video.all')->with($response);
    }


    public function delete($video_id)
    {
        PortfolioVideoFacade::delete($video_id);
        $response['alert-success'] = 'video Deleted Successfully';
        return redirect()->back()->with($response);
    }

    public function changeStatus($video_id)
    {
        $status = PortfolioVideoFacade::changeStatus($video_id);

        if ($status == 1) {
            $response['alert-success'] = 'video Published successfully';
        } else {
            $response['alert-success'] = 'video Drafted successfully';
        }
        return redirect()->back()->with($response);
    }
}
