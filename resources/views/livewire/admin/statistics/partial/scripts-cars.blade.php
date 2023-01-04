<div class="wire:ignore">
    <script>
        function drawCarsChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Car');
            data.addColumn('number', 'Percentage');

            data.addRows([
                @foreach($carBookingsChart as $key => $count)
                    ['{{$key}}', {{$count}}],
                @endforeach
            ]);

            var options = {
                width: container.offsetWidth - 200,
                height: 600
            };

            var chart = new google.visualization.PieChart(document.getElementById('cars_chart'));

            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawCarsChart);
    </script>
</div>

<script>
    window.addEventListener('reloadCarsChart', event => {
        const rows = new Array();

        for (const [key, value] of Object.entries(event.detail)) {
            rows.push([key, value]);
        }

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Car');
        data.addColumn('number', 'Percentage');

        data.addRows(rows);

        var options = {
            width: container.offsetWidth - 200,
            height: 600
        };

        var chart = new google.visualization.PieChart(document.getElementById('cars_chart'));

        chart.draw(data, options);
    });
</script>
