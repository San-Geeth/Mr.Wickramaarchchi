<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerBillingAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'street_address',
        'line_2',
        'city',
        'zip_code',
    ];

}
