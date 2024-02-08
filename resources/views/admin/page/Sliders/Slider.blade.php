<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/admin.css')}}">
    <link
        rel="stylesheet"
        data-purpose="Layout StyleSheet"
        title="Web Awesome"
        href="/css/app-wa-612dd696ed96d6777d290343ca9cef9d.css?vsn=d"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css"
    >

</head>
<body>
<button style="margin-top: 10px;margin-left: 10px;background-color: #a0aec0"><a href="{{route('addsil')}}">ADD</a></button>
<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Image</th>
        <th>Update at</th>
        <th>Cartet at</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    @foreach($sliders as $slider)
        <tbody>
        <tr>
            <td>{{$slider->id}}</td>
            <td><img src="{{Storage::url($slider->image)}}" alt=""></td>
            <td>{{$slider->updated_at?$slider->updated_at->format('Y/m/d'):''}}</td>
            <td>{{$slider->created_at?$slider->created_at->format('Y/m/d'):''}}</td>
           <td style="text-align: center"><a href="{{route('editslider',['id'=>$slider->id])}}"><i class="fa-duotone fa-pen-nib"></i></a></td>
           <td style="text-align: center"><a href="{{route('sliderdelete',['id'=>$slider->id])}}"><i class="fa-duotone fa-trash"></i></a></td>
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
