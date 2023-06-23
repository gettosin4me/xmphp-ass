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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
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
            <h2>XMPHP Assignment: Form Validation</h2>
        </div>
        <div class="card-body">
            <form name="form-add" id="form-add" method="post" action="{{url('/')}}">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">Company Symbol</label>
                    <select name="companySymbol" id="companySymbol" name="companySymbol" class="@error('companySymbol') is-invalid @enderror form-control">
                        @foreach($dataHubsData as $companySymbol)
                            <option value={{ $companySymbol->Symbol }}>
                                {{ $companySymbol->Symbol }}
                            </option>
                        @endforeach
                    </select>
                    @error('companySymbol')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>        
                <div class="form-group">
                    <label for="exampleInputEmail1">Start Date</label>
                    <input type="text" id="startDate" name="startDate" class="@error('startDate') is-invalid @enderror form-control">
                    @error('startDate')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">End Date</label>
                    <input type="text" id="endDate" name="endDate" class="@error('endDate') is-invalid @enderror form-control">
                    @error('endDate')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                    <div class="form-group">
                    <label for="exampleInputEmail1">Email</label>
                    <input type="text" id="email" name="email" class="@error('email') is-invalid @enderror form-control">
                    @error('email')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>    
<script>
$(document).ready(function() {
    $(function() {
        const dateFormat = 'yy-mm-dd';
        $( "#startDate" ).datepicker({
            dateFormat,
        });
        $( "#endDate" ).datepicker({
            dateFormat,
        });
    });
})
if ($("#form-add").length > 0) {
    $("#form-add").validate({
        rules: {
            companySymbol: {
                required: true,
                maxlength: 50
            },
            startDate: {
                required: true,
            },
            endDate: {
                required: true,
            },
            email: {
                required: true,
            },
        },
        messages: {
            companySymbol: {
                required: "Please enter company sympol",
            },
            startDate: {
                required: "Please enter valid start date",
            },
            endDate: {
                required: "Please enter valid end date",
            },
            email: {
                required: "Please enter valid email",
            },
        },
    })
} 
</script>
</body>
</html>