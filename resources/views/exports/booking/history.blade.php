<table>
    <thead>
        <tr>
            <th>Order Id</th>
            <th>Booking Date</th>
            <th>Email</th>
            <th>Vendor</th>
            <th>Car</th>
            <th>Payment Status</th>
            <th>Vendor Status</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Total Price</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Affiliate</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->order_number}}</td>
                <td>{{$booking->created_at->format($date_format)}}</td>
                <td>{{$booking->email}}</td>
                <td>{{$booking->vendor_name}}</td>
                <td>{{$booking->car_name}}</td>
                <td>{{ucfirst($booking->payment_status)}}</td>
                <td>{{ucfirst($booking->vendor_status)}}</td>
                <td>{{$booking->pickup_at->format($date_format)}}</td>
                <td>{{$booking->dropoff_at->format($date_format)}}</td>
                <td>{{formatPrice($booking->total_price, "ISK")}}</td>
                <td>{{$booking->first_name}}</td>
                <td>{{$booking->last_name}}</td>
                <td>{{$booking->affiliate_name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
