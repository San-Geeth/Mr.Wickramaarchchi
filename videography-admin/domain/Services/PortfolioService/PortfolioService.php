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

    public function totalCountOfPortfolios()
    {
        return $this->portfolio->getActive()->count();
    }

    public function checkSlug($request)
    {
        return $this->portfolio->checkSlug($request['slug']);
    }

    public function create(array $data)
    {
        return $this->portfolio->create($data);
    }

    public function find($portfolio_id)
    {
        return $this->portfolio->find($portfolio_id);
    }


    public function update(array $data, $portfolio_id)
    {
        $this->portfolio = $this->portfolio->find($portfolio_id);
        return $this->portfolio->update($this->edit($this->portfolio, $data));
    }

    protected function edit(Portfolio $portfolio, $data)
    {
        return array_merge($portfolio->toArray(), $data);
    }

    public function changeStatus($id)
    {
        $portfolios = $this->find($id);

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
        return $this->find($portfolio_id)->delete();
    }


    public function makeImage( array $data)
    {
        $portfolio = $this->find($data['id']);

        $response = ImagesFacade::store( $data['image'], [1,2,3,4,5]);
        $image = $response['created_images'];

        $imageData = $this->portfolio_image->getImages($data['id']);

        if ($imageData->count() == 0) {
            $status = PortfolioImage::TYPES['PRIMARY'];
        }else{
            $status = PortfolioImage::TYPES['ACTIVE'];
        }

        $this->portfolio_image->create([
            'image' => $image->id,
            'portfolio_id' => $portfolio->id,
            'status' => $status,
        ]);
    }


    public function createImage(array $portfolio_image)
    {
        return $this->portfolio_image->create($portfolio_image);
    }


    public function setPrimary($image_id)
    {
        $images = $this->portfolio_image->find($image_id);

        $p_image = $this->portfolio_image->getPortfolioPrimaryImage($images->portfolio_id);
        $p_image->status = PortfolioImage::TYPES['ACTIVE'];
        $p_image->update();

        $image = $this->portfolio_image->find($image_id);
        $image->status = PortfolioImage::TYPES['PRIMARY'];
        $image->update();
    }

    public function setDisable($image_id)
    {
        $image = $this->portfolio_image->find($image_id);
        $image->status = PortfolioImage::TYPES['DISABLE'];
        $image->update();
    }

    public function setActive($image_id)
    {
        $image = $this->portfolio_image->find($image_id);
        $image->status = PortfolioImage::TYPES['ACTIVE'];
        $image->update();
    }

    public function deleteImage($image_id)
    {
        return $this->portfolio_image->find($image_id)->delete();
    }
}
