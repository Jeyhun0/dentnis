<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add Language</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
</head>
<body>
<div>
    <h2>Add New Language</h2>
    <form action="{{ route('addlanguage') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group py-3">
            <label>Image</label>
            @isset($model)
                <br>
                <img width="200" src="{{ asset('storage/' . $model->image) }}">
            @endisset
            <input type="file" name="image" class="form-control">
            @error('image')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <label for="lang">Language:</label><br>
        <input type="text" id="lang" name="lang"><br><br>
        @error('lang')
        <div class="alert alert-danger">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
</body>
</html>
