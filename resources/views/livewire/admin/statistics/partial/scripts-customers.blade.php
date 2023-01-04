<div class="wire:ignore">
    <script>
        function drawwCustomersChart() {
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Customers');
            data.addColumn('number', 'Number');

            data.addRows([
                @foreach($customersChart as $key => $count)
                    ['{{$key}}', {{$count}}],
                @endforeach
            ]);

            console.log(container.offsetWidth);

            var options = {
                legend: {position: 'none'},
                width: container.offsetWidth - 200,
                height: 600
            };

            var chart = new google.visualization.BarChart(document.getElementById('customers_chart'));

            chart.draw(data, options);
        }
        google.charts.setOnLoadCallback(drawwCustomersChart);
    </script>
</div>

<script>
    window.addEventListener('reloadCustomersChart', event => {
        const rows = new Array();

        for (const [key, value] of Object.entries(event.detail)) {
            rows.push([key, value]);
        }

        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Number');
        data.addColumn('number', 'Percentage');

        data.addRows(rows);

        var options = {
                legend: {position: 'none'},
                width: container.offsetWidth - 200,
                height: 600
            };

        var chart = new google.visualization.BarChart(document.getElementById('customers_chart'));

        chart.draw(data, options);
    });
</script>
