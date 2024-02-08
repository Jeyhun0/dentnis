<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
</head>
<body>

<div class="container mt-5">
    <h2>Blog add Member</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{route('blogShowAdd')}}" method="post" enctype="multipart/form-data">
                <select class="form-select" name="category_id" >
                    @foreach($categories as $category)
                        @foreach($category->translations as $translations)
                            <option value="{{$category->id}}">{{$translations->name}}</option>
                        @endforeach
                    @endforeach
                </select>
              {{--                {{ isset($model) ? route($routeName.'.update', $model->id) : route($routeName.'.store') }}--}}
                @csrf
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
                                <div class="tab-pane fade {{$loop->first ? 'active show' : ''}}" id="tab-{{$lang}}" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                                    <div class="form-group">
                                        <label for="summernote-{{$lang}}">Açıklama</label>
                                        <textarea id="summernote-{{$lang}}" name="{{$lang}}[description]" placeholder="Açıklama">{{ old($lang.'text', isset($model) ? $model->translateOrDefault($lang)->description : '') }}</textarea>
                                        @error("$lang.description")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                        <label for="{{$lang}}-title">title</label>
                                        <input type="text" placeholder="title" name="{{$lang}}[title]" class="form-control" id="{{$lang}}-title"
                                               value="{{old($lang.'text', isset($model) ? $model->translateOrDefault($lang)->title : '')}}">
                                        @error("$lang.title")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <label for="Slug">slug</label>
                <input type="text" placeholder="Slug" name="Slug" class="form-control" id="Slug"
                       value="{{old($lang.'text', isset($model) ? $model->translateOrDefault($lang)->slug : '')}}">
                @error("Slug")
                <span class="text-danger">{{$message}}</span>
                @enderror
                <div class="form-group py-3">
                    <label>Image</label>
                    @isset($model)
                        <br>
                        <img width="200" src="{{ asset('storage/'.$model->image) }}">
                    @endisset
                    <input type="file" name="image" class="form-control">
                    @error('image')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>


                <button class="btn btn-success">Save</button>
            </form>
        </div>
    </div>




    <!-- Include Bootstrap JS and Popper.js (required for Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <!-- Include Summernote JS -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <script>
        @foreach(config('app.languages') as $lang)
        var summernoteContent_{{$lang}} = $('#summernote-{{$lang}}').summernote('code');
        console.log('Content for {{$lang}}:', summernoteContent_{{$lang}});
        @endforeach
    </script>
    <script>

        $(document).ready(function () {
            @foreach(config('app.languages') as $lang)
            $('#summernote-{{$lang}}').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                height: 100
            });
            @endforeach
        });
    </script>
</body>
</html>
