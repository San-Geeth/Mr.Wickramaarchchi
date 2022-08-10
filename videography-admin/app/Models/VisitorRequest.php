<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VisitorRequest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'subject',
        'message',
        'read'
    ];

    public function totalCountOfUnreadVisitorRequests()
    {
        return $this->where('read',0)->get()->count();
    }
}
