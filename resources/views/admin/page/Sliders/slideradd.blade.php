<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sponsor Member</title>

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <!-- Include Summernote CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css">
</head>
<body>

<div class="container mt-5">
    <h2>Add slider Member</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('slideradd') }}" method="POST" enctype="multipart/form-data">
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

                <!-- Add other form fields as needed -->

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
            // Initialize Summernote Editor
            new Summernote($('#summernote'), {
                placeholder: 'Description',
                height: 200,
                // Add other Summernote options as needed
            });
        });
    </script>
</div>
</body>
</html>


