<table>
    <thead>
        <tr>
            <th>Email</th>
            <th>Name</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
            <tr>
                <td>{{$user->email}}</td>
                <td>{{$user->bookings()->first()?->first_name}} {{$user->bookings()->first()?->last_name}}</td>
            </tr>
        @endforeach
    </tbody>
</table>
