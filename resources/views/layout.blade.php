<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>考试管理</title>
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/blue.css" rel="stylesheet">
    <link href="/css/libs.css" rel="stylesheet">
    <style>

    </style>
</head>
<body>

    @include('partials.page-nav')

    @yield('content')

    <script src="/js/jquery-2.2.2.js"></script>
    <script src="/js/libs.js"></script>
    @yield('scripts')
</body>
</html>