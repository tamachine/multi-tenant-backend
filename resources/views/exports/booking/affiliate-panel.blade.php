<table>
    <thead>
        <tr>
            <th>Commission</th>
            <th>Car</th>
            <th>Booking Date</th>
            <th>Pickup Date</th>
            <th>Dropoff Date</th>
            <th>Concluded</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{formatPrice($booking->affiliate_commission, "ISK")}}</td>
                <td>{{$booking->car_name}}</td>
                <td>{{$booking->created_at->format($date_format)}}</td>
                <td>{{$booking->pickup_at->format($date_format)}}</td>
                <td>{{$booking->dropoff_at->format($date_format)}}</td>
                <td>{{$booking->status == 'concluded' ? 'Yes' : 'No'}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
