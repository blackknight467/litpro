<html>
<head>
    <title>Litpro - @yield('title')</title>
    <meta charset="UTF-8"/>
    {{ HTML::style('css/app.css') }}
    {{ HTML::script('js/app.js') }}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('nav')
    <div class="container">
        @yield('content')
    </div>
</div>
</body>
</html>