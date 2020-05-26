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

    public function __construct(int $event_id)
    {
        $this->event_id = $event_id;
    }

    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        if ($this->event_id != 0)
            $orders = Order::query()->whereEventId($this->event_id)->with('user')->get();
        else
            $orders = Order::query()->with('user')->get();

        return view('cms.order.excel', compact('orders'));
    }
}
