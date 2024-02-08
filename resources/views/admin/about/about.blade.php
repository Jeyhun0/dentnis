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
<h2>Abouts</h2>
<button style="margin-top: 10px; margin-left: 10px; background-color: #a0aec0">
    <a href="{{ route('aboutadd') }}">ADD</a>
</button>
<table class="table mt-3">
    <thead>
    <tr>
        <th>ID</th>
        <th>Description</th>
        <th>language</th>
    </tr>
    </thead>
    <tbody>
    @foreach($abouts as $about)
        <tr>
            {{--                @dd($blog)--}}

            <td>{{ $about->id }}</td>
            @foreach($about->translations as $item )
                <td>{!! Str::limit(strip_tags($item->description),70)  !!}</td>
            @endforeach

            <td>
{{--                <a href="{{ route('admin.about.edit', ['about' => $about->id]) }}" class="btn btn-primary">Edit</a>--}}
{{--                <form action="{{ route('admin.about.destroy', ['about' => $about->id]) }}" method="POST"--}}
{{--                      class="d-inline">--}}
{{--                    @csrf--}}
{{--                    @method('DELETE')--}}
{{--                    <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete--}}
{{--                    </button>--}}
{{--                </form>--}}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

</body>
</html>
