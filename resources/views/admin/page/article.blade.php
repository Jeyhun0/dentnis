<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin.css')}}">
</head>
<body>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Update at</th>
        <th>Cartet at</th>
        <th>Edit</th>
        <th>Delete</th>
        <th>Add</th>
    </tr>
    </thead>
    @foreach($articles as $article)
        <tbody>
        <tr>
            <td>{{$article->id}}</td>
            <td><img src="{{$article->image}}" alt="" style="width: 400px; height: 300px;"></td>
            <td>{{$article->updated_at?$article->updated_at->format('Y/m/d'):''}}</td>
            <td>{{$article->created_at?$article->created_at->format('Y/m/d'):''}}</td>
            <td>edit</td>
            <td>delete</td>
            <td>add</td>
        </tr>
        <!-- Add more rows as needed -->
        </tbody>
    @endforeach

</table>
<div>
    <!-- Your additional content or form for creating a new row -->

</div>
</body>
</html>
