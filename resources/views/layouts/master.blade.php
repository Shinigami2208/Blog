<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" type="text/css" href="{{url('css/app.css')}}" />
</head>
<body>
    
<div id="app">
    <div class="container">
        <div class="col-12">
            @yield('page_content')
        </div>
    </div>
</div>

<script type="text/javascript" src="{{url('js/app.js')}}"></script>
</body>
</html>