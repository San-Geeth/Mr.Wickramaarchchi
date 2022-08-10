<?php

namespace domain\Services\PortfolioService;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use infrastructure\Facades\ImagesFacade;

class PortfolioService
{
    public function __construct()
    {
        $this->portfolio = new Portfolio();
        $this->portfolio_image = new PortfolioImage();
    }

    public function all()
    {
        return $this->portfolio->all();
    }

    public function getActive()
    {
        return $this->portfolio->getActive();
    }

    public function find($portfolio_id)
    {
        return $this->portfolio->find($portfolio_id);
    }

    public function allImages()
    {
        return $this->portfolio_image->allImages();
    }
}
