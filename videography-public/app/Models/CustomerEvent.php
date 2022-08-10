<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerEvent extends Model
{
    use HasFactory;

    const STATUS = ['PENDING' => 0, 'APPROVE' => 1, 'CANCEL' => 2, 'DONE' => 3];

    protected $fillable = [
        'title',
        'customer_id',
        'event_id',
        'date',
        'status',
        'total',
        'pay',
        'balance',
        'reason',
        'note',
    ];

    public function getByDate($date)
    {
        return $this->where('date',Carbon::parse($date)->format('Y-m-d'))->get();
    }

    public function customers()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }

    public function events()
    {
        return $this->hasOne(Event::class, 'id', 'event_id');
    }
}
