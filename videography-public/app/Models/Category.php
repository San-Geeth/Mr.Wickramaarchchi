<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'status',
    ];

    public function getActive()
    {
        return $this->where('status', 1)->get();
    }

    public function events()
    {
        return $this->hasMany(Event::class, 'category_id', 'id');
    }
}
