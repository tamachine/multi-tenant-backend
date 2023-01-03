<div class="wire:ignore">
    <script>
        function drawBookingsChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Month');
            data.addColumn('number', 'Bookings');

            data.addRows([
                @foreach($bookingsPerMonth as $key => $count)
                    ['{{$key}}', {{$count}}],
                @endforeach
            ]);

            var options = {
                legend: {position: 'none'}
            };

            var chart = new google.visualization.LineChart(document.getElementById('bookings_month'));

            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawBookingsChart);
    </script>
</div>

<script>
    window.addEventListener('reloadBookingsChart', event => {
        const rows = new Array();

        for (const [key, value] of Object.entries(event.detail)) {
            rows.push([key, value]);
        }

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Month');
        data.addColumn('number', 'Bookings');

        data.addRows(rows);

        var options = {
            legend: {position: 'none'}
        };

        var chart = new google.visualization.LineChart(document.getElementById('bookings_month'));

        chart.draw(data, options);
    });
</script>
