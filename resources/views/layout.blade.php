<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>教务系统</title>
    <link href="/css/libs.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/blue.css" rel="stylesheet">
    <link href="/css/style.css" rel="stylesheet">
</head>
<body>

    @include('partials.page-nav')

    @yield('content')

    <script src="/js/jquery-2.2.2.js"></script>
    <script src="/js/libs.js"></script>

    <script>
        $('#my-table').dynatable();
        $('#my-table2').dynatable();
    </script>

    @yield('scripts')
</body>
</html>