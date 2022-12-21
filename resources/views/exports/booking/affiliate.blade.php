<table>
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Booking Date</th>
            <th>Commission</th>
            <th>Vendor</th>
            <th>Car</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Total Price</th>
            <th>Concluded</th>
            <th>Year</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->order_id}}</td>
                <td>{{$booking->created_at->format($date_format)}}</td>
                <td>{{formatPrice($booking->affiliate_commission, "ISK")}}</td>
                <td>{{$booking->vendor_name}}</td>
                <td>{{$booking->car_name}}</td>
                <td>{{$booking->pickup_at->format($date_format)}}</td>
                <td>{{$booking->dropoff_at->format($date_format)}}</td>
                <td>{{formatPrice($booking->total_price, "ISK")}}</td>
                <td>{{$booking->status == 'concluded' ? 'Yes' : 'No'}}</td>
                <td>{{$booking->dropoff_at->format('Y')}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
