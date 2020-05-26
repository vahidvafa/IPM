<table>
    <thead>
    <tr>
        <th>ردیف</th>
        <th>نام و نام خانوادگی</th>
        <th>مبلغ</th>
        <th>تاریخ خرید</th>
        <th>توضیحات</th>
        <th>شماره پیگیری بانک</th>
        <th>وضغیت پرداخت</th>
    </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
        <tr>
            <td>{{ ($loop->index + 1) }}</td>
            <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
            <td>{{ number_format($order->total_price)}}</td>
            <td>{{ jdate($order->updated_at)->format('Y/m/d H:i') }}</td>
            <td>{{ $order->comment }}</td>
            <td>{{ $order->reference_number }}</td>
            <td>@switch($order->state_id) @case(0) منتظر پرداخت @break @case(1) موفق @break @case(2) ناموفق @break @endswitch</td>
        </tr>
    @endforeach
    </tbody>
</table>
