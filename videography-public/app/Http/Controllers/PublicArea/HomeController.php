<?php

namespace App\Http\Controllers\PublicArea;

use App\Http\Controllers\Controller;
use domain\Facades\CategoryFacade;
use domain\Facades\CustomerFacade;
use domain\Facades\PortfolioFacade;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $response['tc'] = $this;
        return view('PublicArea.Pages.Home.index')->with($response);
    }

    public function about()
    {
        return view('PublicArea.Pages.About.index');
    }

    public function pricing()
    {
        $response['categories'] = CategoryFacade::getActive();
        return view('PublicArea.Pages.Pricing.index')->with($response);
    }

    public function portfolio()
    {
        $response['portfolio_images'] = PortfolioFacade::allImages();
        return view('PublicArea.Pages.Portfolio.index')->with($response);
    }

    public function validateEmail(Request $request)
    {
        return CustomerFacade::validateEmail($request);
    }
}
