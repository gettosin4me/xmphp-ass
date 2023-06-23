<!DOCTYPE html>
<html>
<head>
<title>Laravel 9 jQuery Validation Example Tutorial - Tutsmake.com</title>
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link href=
'https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/ui-lightness/jquery-ui.css'
          rel='stylesheet'>
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
            <h2>XMPHP Assignment: Content</h2>
        </div>
        <div class="card-body">
            From {{ startDate }} to {{ endDate }}
        </div>
    </div>
</div>
</body>
</html>