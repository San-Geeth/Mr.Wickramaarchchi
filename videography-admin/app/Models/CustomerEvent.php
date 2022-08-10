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

    public function customerBookings($id)
    {
        return $this->where('customer_id',$id)->get();
    }

    public function chartData()
    {
        $data['jan'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 1)->count();
        $data['feb'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 2)->count();
        $data['mar'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 3)->count();
        $data['apr'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 4)->count();
        $data['may'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 5)->count();
        $data['jun'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 6)->count();
        $data['jul'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 7)->count();
        $data['aug'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 8)->count();
        $data['sep'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 9)->count();
        $data['oct'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 10)->count();
        $data['nov'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 11)->count();
        $data['dec'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 12)->count();

        return $data;
    }

    public function popular()
    {
        return $this->select('event_id')
        ->selectRaw('COUNT(*) AS count')
        ->groupBy('event_id')
        ->orderByDesc('count')
        ->limit(5)
        ->get();
    }


}
