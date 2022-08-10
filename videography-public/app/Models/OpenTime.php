<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenTime extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'open',
        'close',
        'status'
    ];
    
    public function getByName($name)
    {
        return $this->where('name', $name)->first();
    }
}
