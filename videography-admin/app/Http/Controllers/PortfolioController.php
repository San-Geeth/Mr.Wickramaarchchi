<?php

namespace App\Http\Controllers;

use App\Models\PortfolioImage;
use App\Traits\FormHelper;
use domain\Facades\CategoryFacade;
use domain\Facades\PortfolioFacade;
use Illuminate\Http\Request;

class PortfolioController extends ParentController
{
    use FormHelper;

    public function index()
    {
        $response['portfolios'] = PortfolioFacade::all();
        $response['tc'] = $this;
        return view('Pages.Portfolios.all')->with($response);
    }

    public function new()
    {
        $response['categories'] = CategoryFacade::getActive();
        return view('Pages.Portfolios.new')->with($response);
    }

    public function store(Request $request)
    {
        $response['portfolio'] = PortfolioFacade::create($request->all());
        $response['alert-success'] = 'Portfolio stored successfully!';
        return redirect()->route('portfolios.edit', $response['portfolio']->id)->with($response);
    }

    public function edit($portfolio_id)
    {
        $response['portfolio'] = PortfolioFacade::find($portfolio_id);
        $response['categories'] = CategoryFacade::getActive();
        return view('Pages.Portfolios.edit')->with($response);
    }

    public function update(Request $request, $portfolio_id)
    {
        PortfolioFacade::update($request->all(), $portfolio_id);
        $response['alert-success'] = 'Portfolio updated successfully!';
        return redirect()->route('portfolios.all')->with($response);
    }

    public function storeImage(Request $request)
    {
        PortfolioFacade::makeImage($request->all());
        $response['alert-success'] = 'Portfolio image stored successfully!';
        return redirect()->back()->with($response);
    }

    public function ImageStatus($image_id, $status)
    {
        if ($status == PortfolioImage::TYPES['PRIMARY']) {
            PortfolioFacade::setPrimary($image_id);
        } else if ($status == PortfolioImage::TYPES['DISABLE']) {
            PortfolioFacade::setDisable($image_id);
        } else if ($status == PortfolioImage::TYPES['ACTIVE']) {
            PortfolioFacade::setActive($image_id);
        }

        $response['alert-success'] = 'Portfolio image status change successfully!';
        return redirect()->back()->with($response);
    }

    public function ImageDelete($image_id)
    {
        PortfolioFacade::deleteImage($image_id);
        $response['alert-success'] = 'Portfolio image delete successfully!';
        return redirect()->back()->with($response);
    }

    public function changeStatus($portfolio_id)
    {
        $status = PortfolioFacade::changeStatus($portfolio_id);

        if ($status == 1) {
            $response['alert-success'] = 'Portfolio Published successfully';
        } else {
            $response['alert-success'] = 'Portfolio Drafted successfully';
        }
        return redirect()->back()->with($response);
    }

    public function delete($portfolio_id)
    {
        PortfolioFacade::delete($portfolio_id);
        $response['alert-success'] = 'Portfolio Deleted successfully!';
        return redirect()->back()->with($response);
    }
}
