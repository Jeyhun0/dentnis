<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Blog</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
</head>

<body>
<div class="container">
    <h2>Edit Blog</h2>

    <form action="{{ route('blogupdate', ['id' => $blog->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="language-select">
            <label for="category_id">Select Category:</label>
            <select class="form-select" name="category_id" id="category_id">
                @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{$blog->category_id == $category->id ? 'selected' : ''}} >{{ $category->translation->name ?? 'bosdur' }}</option>
                @endforeach
            </select>
        </div>

        <div class="btn">
            <div class="card card-primary card-tabs">
                <div class="card-header p-0 pt-1">
                    <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                        @foreach(config('app.languages') as $lang)
                            <li class="nav-item">
                                <a class="nav-link {{$loop->first ? 'active show' : ''}} @error("$lang.title") text-danger @enderror"
                                   id="custom-tabs-one-home-tab" data-bs-toggle="pill" href="#tab-{{$lang}}" role="tab"
                                   aria-controls="custom-tabs-one-home" aria-selected="true">{{$lang}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="custom-tabs-one-tabContent">
                        @foreach(config('app.languages') as $index => $lang)
                            <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="tab-{{$lang}}" role="tabpanel"
                                 aria-labelledby="custom-tabs-one-home-tab">
                                <div class="form-group">
                                    @php
                                        $langId = \App\Models\Language::where('lang', $lang)->first()->id;
                                    @endphp
                                    <label for="{{$lang}}-title">Title</label>
                                    <input type="text" name="{{$lang}}[title]" class="form-control" id="{{$lang}}-title" value="{{ old($lang.'.title', $blog->translations->where('language_id', $langId)->first()->title ?? '') }}">
                                    @error("$lang.title")
                                    <span class="text-danger">{{$message}}</span><br>
                                    @enderror
                                    <label for="summernote">Description</label>
                                    <textarea type="text" placeholder="Description" name="{{$lang}}[description]"
                                              class="form-control summernote" id="summernote">{{ old($lang.'.description', $blog->translations->where('language_id', $langId)->first()->description ?? '') }}</textarea>
                                    @error("$lang.description")
                                    <span class="text-danger">{{$message}}</span><br>
                                    @enderror
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <label for="itemImg">Image:</label>
        <input type="file" id="itemImg" name="itemImg">

        <label for="itemSlug">Slug:</label>
        <input class="form-control" type="text" id="itemSlug" name="itemSlug" value="{{ $blog->slug }}">
        @error('itemSlug')
        <span class="text-danger">{{$message}}</span>
        @enderror

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
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
