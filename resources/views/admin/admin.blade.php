<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin.css')}}">
</head>
<body>
<div id="sidebar">
    <ul >
        <li><a href="{{route('sponsor')}}">Sponsor</a></li>
        <li><a href="{{route('quotes')}}">Quotes</a></li>
        <li><a href="{{route('category')}}">category</a></li>
        <li><a href="{{route('team')}}">team</a></li>
        <li><a href="{{route('sliders')}}">slider</a></li>
        <li><a href="{{route('blog')}}">blog</a></li>
        <li><a href="{{route('youtube')}}">youtube</a></li>
        <li><a href="{{route('language')}}">language</a></li>
        <li><a href="{{route('about')}}">about</a></li>
    </ul>
</div>
<div id="content">
    <h1 style="text-align: center">Admin Dashboard</h1>

</div>
</body>
</html>
