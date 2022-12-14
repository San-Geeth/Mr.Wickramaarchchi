<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'facebook',
        'twitter',
        'linkedin',
        'pinterest',
        'youtube',
        'instagram'
    ];
}
