<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($bookings as $booking)
            <tr>
                <td>{{$booking->email}}</td>
                <td>{{$booking->first_name}} {{$booking->last_name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
