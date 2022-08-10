<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profit extends Model
{
    use HasFactory;

    const TYPE = ['RETAIL' => 1, 'WHOLESALE' => 2];


    protected $fillable = [
        'order_id',
        'order_type',
        'value',
    ];

    public function getByOrder($order_id, $type)
    {
        return $this->where('order_id', $order_id)->where('order_type', $type)->first();
    }

    public function retailOrders()
    {
        return $this->hasOne(Order::class, 'id', 'order_id');
    }

    public function wholesaleOrders()
    {
        return $this->hasOne(WholesaleOrder::class, 'id', 'order_id');
    }

    public function monthlyProfit()
    {
        return $this->whereMonth('created_at', Carbon::parse(Carbon::now()))->sum('value');
    }

    public function chartData()
    {
        $data['jan'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 1)->sum('value');
        $data['feb'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 2)->sum('value');
        $data['mar'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 3)->sum('value');
        $data['apr'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 4)->sum('value');
        $data['may'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 5)->sum('value');
        $data['jun'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 6)->sum('value');
        $data['jul'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 7)->sum('value');
        $data['aug'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 8)->sum('value');
        $data['sep'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 9)->sum('value');
        $data['oct'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 10)->sum('value');
        $data['nov'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 11)->sum('value');
        $data['dec'] =  $this->whereYear('created_at', Carbon::parse(Carbon::now()))->whereMonth('created_at', 12)->sum('value');

        return $data;
    }
}
