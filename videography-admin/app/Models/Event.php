<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'introduction',
        'description',
        'price',
        'category_id',
        'package_id',
        'status',
    ];


    /**
     * check Slug
     *
     * @param  mixed $slug
     * @return void
     */
    public function checkSlug($slug)
    {
        $data = $this->where('slug', $slug)->first();
        return $data ? 1 : 0;
    }



    public function primaryImage()
    {
        return $this->hasOne(EventImage::class, 'event_id', 'id')->where('status', EventImage::TYPES['PRIMARY']);
    }


    public function secondaryImages()
    {
        return $this->hasMany(EventImage::class, 'event_id', 'id')->where('status', '!=', EventImage::TYPES['PRIMARY']);
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
