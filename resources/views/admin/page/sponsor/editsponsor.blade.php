<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Team</title>
    <link rel="stylesheet" href="{{asset('assets/admin/css/edit.css')}}">

</head>
<body>
<div class="container">
    <h2>Edit Team</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Team</div>

                    <div class="card-body">
                        <form action="{{ route('sponupdate', ['id' => $sponsors->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Resim:</label>
                                <input type="file" name="image">
                                <img width="100" src="{{ asset('storage/'.$sponsors->image) }}">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/admin/js/edit.js')}}"></script>
</div>
</body>
</html>

