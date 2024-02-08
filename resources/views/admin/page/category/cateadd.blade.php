<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Team Member</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
</head>

<body>

<div class="container mt-5">
    <h2>Add Team Member</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('catadd') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card card-primary card-tabs">
                    <div class="card-header p-0 pt-1">
                        <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
                            @foreach(config('app.languages') as $lang)
                                <li class="nav-item">
                                    <a class="nav-link {{ $loop->first ? 'active show' : '' }} @error("$lang.name") text-danger @enderror" id="custom-tabs-one-{{ $lang }}-tab" data-bs-toggle="pill" href="#tab-{{ $lang }}" role="tab" aria-controls="custom-tabs-one-{{ $lang }}" aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $lang }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-one-tabContent">
                            @foreach(config('app.languages') as $index => $lang)
                                <div class="tab-pane fade {{ $loop->first ? 'active show' : '' }}" id="tab-{{ $lang }}" role="tabpanel" aria-labelledby="custom-tabs-one-{{ $lang }}-tab">
                                    <div class="form-group">
                                        <label for="{{ $lang }}-name">Name</label>
                                        <input type="text" placeholder="Name" name="{{ $lang }}[name]" class="form-control" id="{{ $lang }}-name" value="{{ old($lang.'.name', isset($model) ? $model->translateOrDefault($lang)->name : '') }}">
                                        @error("$lang.name")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="{{ $lang }}-slug">Slug</label>
                                        <input type="text" placeholder="Slug" name="{{ $lang }}[slug]" class="form-control" id="{{ $lang }}-slug" value="{{ old($lang.'.slug', isset($model) ? $model->translateOrDefault($lang)->first()->slug : '') }}">
                                        @error("$lang.slug")
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <!-- Summernote Editor for Description -->

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
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize Bootstrap Tabs
            var tabs = new bootstrap.Tab(document.querySelector('#custom-tabs-one-en-tab'));
            tabs.show();

            // Initialize Summernote Editor
            $('#summernote-description').summernote({
                placeholder: 'Description',
                height: 200,
                // Add other Summernote options as needed
            });
        });
    </script>
</div>
</body>

</html>
