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
<button style="margin-top: 10px;margin-left: 10px;background-color: #a0aec0"><a href="{{route('languageadd')}}">ADD</a></button>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>lange</th>
        <th>image</th>
        <th>time</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    @foreach($languages as $language)
        <tbody>
        <tr>
            <td>{{$language->id}}</td>
            <td>{{$language->lang}}</td>
            <td><img src="{{Storage::url($language->image)}}" alt=""></td>
            <td>{{$language->created_at?$language->created_at->format('Y/m/d'):''}}</td>
            <td style="text-align: center"><a href="{{route('editlanguage',['id'=>$language->id])}}"><i class="fa-duotone fa-pen-nib"></i></a></td>
            <td style="text-align: center"><a href="{{route('languagedelete',['id'=>$language->id])}}"><i class="fa-duotone fa-trash"></i></a></td>
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

