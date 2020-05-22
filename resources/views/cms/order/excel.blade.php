<table>
    <thead>
    <tr>
        <th>ردیف</th>
        <th>کاربر</th>
        <th>قیمت خرید</th>
        <th>تاریخ خرید</th>
    </tr>
    </thead>
    <tbody>

    @foreach($orders as $order)
        <tr>
            <td>{{ ($loop->index + 1) }}</td>
            <td>{{ $order->user->first_name.' '.$order->user->last_name }}</td>
            <td>{{ number_format($order->total_price)}}</td>
            <td>{{ jdate($order->updated_at)->format('Y/m/d H:i') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
