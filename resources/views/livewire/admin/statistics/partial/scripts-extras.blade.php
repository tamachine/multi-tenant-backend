<div class="wire:ignore">
    <script>
        function drawwExtrasChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Extras');
            data.addColumn('number', 'Percentage');

            data.addRows([
                @foreach($extrasChart as $key => $count)
                    ['{{$key}}', {{$count}}],
                @endforeach
            ]);

            var options = {
                width: container.offsetWidth - 200,
                height: 600
            };

            var chart = new google.visualization.PieChart(document.getElementById('extras_chart'));

            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawwExtrasChart);
    </script>
</div>

<script>
    window.addEventListener('reloadExtrasChart', event => {
        const rows = new Array();

        for (const [key, value] of Object.entries(event.detail)) {
            rows.push([key, value]);
        }

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Extras');
        data.addColumn('number', 'Percentage');

        data.addRows(rows);

        var options = {
            width: container.offsetWidth - 200,
                height: 600
        };

        var chart = new google.visualization.PieChart(document.getElementById('extras_chart'));

        chart.draw(data, options);
    });
</script>
