<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'status',
    ];

    public function primaryImage()
    {
        return $this->hasOne(PortfolioImage::class, 'portfolio_id', 'id')->where('status', PortfolioImage::TYPES['PRIMARY']);
    }


    public function secondaryImages()
    {
        return $this->hasMany(PortfolioImage::class, 'portfolio_id', 'id')->where('status', '!=', PortfolioImage::TYPES['PRIMARY']);
    }


    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getActive()
    {
        return $this->where('status', 1)->get();
    }
}
