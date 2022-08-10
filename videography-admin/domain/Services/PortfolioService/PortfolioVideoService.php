<?php

namespace domain\Services\PortfolioService;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use App\Models\PortfolioVideo;
use infrastructure\Facades\ImagesFacade;

class PortfolioVideoService
{
    public function __construct()
    {
        $this->portfolio_video = new PortfolioVideo();
    }

    public function all()
    {
        return $this->portfolio_video->all();
    }

    public function getActive()
    {
        return $this->portfolio_video->getActive();
    }

    public function totalCountOfPortfolios()
    {
        return $this->portfolio_video->getActive()->count();
    }

    public function create(array $data)
    {
        return $this->portfolio_video->create($data);
    }

    public function get($portfolio_id)
    {
        return $this->portfolio_video->find($portfolio_id);
    }


    public function update(array $data, $portfolio_id)
    {
        $portfolio_video = $this->portfolio_video->find($portfolio_id);
        return $portfolio_video->update($this->edit($portfolio_video, $data));
    }

    protected function edit(PortfolioVideo $portfolio, $data)
    {
        return array_merge($portfolio->toArray(), $data);
    }

    public function changeStatus($portfolio_id)
    {
        $portfolios = $this->portfolio_video->find($portfolio_id);

        if ($portfolios->status == 0) {
            $portfolios->status = 1;
            $portfolios->update();
            return 1;
        } else {
            $portfolios->status = 0;
            $portfolios->update();
            return 0;
        }

    }

    public function delete($portfolio_id)
    {
        return $this->portfolio_video->find($portfolio_id)->delete();
    }

}
