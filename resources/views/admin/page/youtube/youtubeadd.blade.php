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
    <h2>youtube add</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">youtube add</div>

                    <div class="card-body">
                        <form action="{{ route('youtubeadd')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">youtube:</label>
                                <input type="url" name="url">
                                @error('url')
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

