<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit YouTube Video</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/edit.css') }}">
</head>
<body>
<div class="container">
    <h2>Edit YouTube Video</h2>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit YouTube Video</div>

                    <div class="card-body">
                        <form action="{{ route('youtubeupdate', ['id' => $youtube->id]) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="url">YouTube URL:</label>
                                <input type="url" name="url" value="{{ $youtube->url }}" class="form-control" placeholder="Enter YouTube URL" required>
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
</div>
</body>
</html>
