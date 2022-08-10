<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    use HasFactory;

    const TYPES = ['PRIMARY' => 1, 'ACTIVE' => 2, 'DISABLE' => 3];

    protected $fillable = [
        'image',
        'event_id',
        'status',
    ];


    public function images()
    {
        return $this->hasOne(Image::class, 'id', 'image');
    }


    public function getImages($event_id)
    {
        return $this->where('event_id', $event_id)->get();
    }


    public function getEventPrimaryImage($event_id)
    {
        return $this->where('status', 1)->where('event_id', $event_id)->first();
    }
}
