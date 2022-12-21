<table>
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Pickup Date</th>
            <th>Payment</th>
            <th>Vendor</th>
            <th>Car Name</th>
            <th>Booking Date</th>
            <th>Online</th>
            <th>Last Message</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->order_id}}</td>
                <td>{{$booking->pickup_at->format('d-m-Y H:i')}}</td>
                <td>{{ucfirst($booking->payment_status)}}</td>
                <td>{{ucfirst($booking->vendor_status)}}</td>
                <td>{{$booking->car_name}}</td>
                <td>{{$booking->created_at->format('d-m-Y H:i')}}</td>
                <td>{{formatPrice($booking->online_payment, "ISK")}}</td>
                <td>{{$booking->last_log}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
