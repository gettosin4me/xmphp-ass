<!DOCTYPE html>
<html>
<head>
<title>Laravel 9 jQuery Validation Example Tutorial - Tutsmake.com</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src=
"https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" >
    </script>
<style>
    .error{
    color: #FF0000; 
}
</style>
</head>
<body>
<div class="container mt-4">
    @if(session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="card">
        <div class="card-header text-center font-weight-bold">
            <h2>XMPHP Assignment: Histories - {{ $companyName }}</h2>
        </div>
        <div class="card-body">
            <canvas id="historyChart" width="100"></canvas>
            <h1>Table</h1>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Date</th>
                        <th>Open</th>
                        <th>High</th>
                        <th>Low</th>
                        <th>Close</th>
                        <th>Volume</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prices as $price)
                        <tr>
                            @inject('carbon', 'Carbon\Carbon')
                            <td>{{ isset($price->date) ? $carbon->parse($price->date)->format('Y-m-d') : 'N/A' }}</td>
                            <td>{{ isset($price->open) ? $price->open : 'N/A' }}</td>
                            <td>{{ isset($price->high) ? $price->high : 'N/A' }}</td>
                            <td>{{ isset($price->low) ? $price->low : 'N/A' }}</td>
                            <td>{{ isset($price->close) ? $price->close : 'N/A' }}</td>
                            <td>{{ isset($price->volume) ? $price->volume : 'N/A' }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>    
<script>
    const graph = {!! json_encode($graph, JSON_HEX_TAG) !!};
const ctx = document.getElementById('historyChart');
  new Chart(ctx, {
    type: 'line',
    data: {
        labels: graph.date,
        datasets: [
            {
                label: 'Open Price',
                data: graph.openData,
                borderColor: '#0000ff',
            },
            {
                label: 'Close Price',
                data: graph.closedData,
                borderColor: '#ff0000',
            }
        ]
    }
  });
</script>
</body>
</html>