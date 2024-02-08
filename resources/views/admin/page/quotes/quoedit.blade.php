<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Team</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/edit.css') }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
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
                        <form action="{{ route('quoupdat', ['id' => $quote->id]) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="image">Resim:</label>
                                <input type="file" name="image">
                                <img width="100" src="{{ asset('storage/'.$quote->image) }}" alt="Image">
                                @error('image')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            @foreach($translations as $translation)
                                <div class="form-group my-2">
                                    <label for="summernote">Description</label>
                                    <textarea type="text" name="{{$translation->language->lang}}[description]"
                                              class="form-control blogs summernote">{!! $translation ? $translation->description : '' !!}</textarea>
                                    @error("$translation->language->lang.description")
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group my-2">
                                    <label for="title">Title:</label>
                                    <input type="text" name="{{$translation->language->lang}}[title]"
                                           class="form-control" value="{{ old('title', $translation->title) }}">
                                    @error("$translation->language->lang.title")
                                    <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            @endforeach

                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
<script src="{{ asset('assets/admin/js/edit.js') }}"></script>

<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            placeholder: 'Hello Bootstrap 4',
            tabsize: 2,
            height: 100
        });
    });
</script>
</body>

</html>

