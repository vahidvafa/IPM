<?php

namespace App\Exports;

use App\Order;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Illuminate\Contracts\View\View;

class OrdersExport implements FromView
{
    use Exportable;

    protected $event_id;

    protected $orderModel;

    public function __construct(int $event_id,$order)
    {
        $this->event_id = $event_id;
        $this->orderModel = $order;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        if ($this->event_id != 0)
            $orders = Order::query()->whereEventId($this->event_id)->whereStateId(1)->with('user')->get();
        else
            $orders = Order::query()->whereStateId(1)->with('user')->get();

        return view('cms.order.excel', compact('orders'));
    }
}
