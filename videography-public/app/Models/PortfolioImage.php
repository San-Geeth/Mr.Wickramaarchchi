<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioImage extends Model
{
    use HasFactory;

    const TYPES = ['PRIMARY' => 1, 'ACTIVE' => 2, 'DISABLE' => 3];

    protected $fillable = [
        'image',
        'portfolio_id',
        'status',
    ];


    public function images()
    {
        return $this->hasOne(Image::class, 'id', 'image');
    }

    public function getImages($portfolio_id)
    {
        return $this->where('portfolio_id', $portfolio_id)->get();
    }

    public function getPortfolioPrimaryImage($portfolio_id)
    {
        return $this->where('status', 1)->where('portfolio_id', $portfolio_id)->first();
    }

    public function allImages()
    {
        return $this->where('status','!=',3)->get();
    }

    public function portfolios()
    {
        return $this->hasOne(Portfolio::class, 'id', 'portfolio_id');
    }
}
