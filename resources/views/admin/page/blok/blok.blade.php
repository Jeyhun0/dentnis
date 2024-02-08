</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blok Table</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link rel="stylesheet" href="/css/app-wa-612dd696ed96d6777d290343ca9cef9d.css?vsn=d">

    <!-- Include Font Awesome CSS -->
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css">
</head>

<body>
<button style="margin-top: 10px; margin-left: 10px; background-color: #a0aec0">
    <a href="{{ route('blogadd') }}">ADD</a>
</button>

<div>
    <label for="language">Select Language:</label>
    <select name="language" id="language">
        <option value="">All Languages</option>
@foreach($languages as $language)
            <option value="{{ $language->id }}">{{ $language->lang }}</option>
        @endforeach
    </select>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>ID</th>
        <th>image</th>
        <th>slug</th>
        <th>category name</th>
        <th>Title</th>
        <th>description</th>
        <th>Language</th>
        <th>Start Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody id="blogTableBody">
    @foreach($blogs as $blog)
            <tr class="language-{{ $blog->translation->language_id }}">
                <td>{{ $blog->id }}</td>
                <td><img src="{{ Storage::url($blog->image) }}" alt="image{{ $blog->id }}"></td>
                <td>{{ $blog->slug }}</td>
                <td>{{ $blog->category->name ?? 'bosdur'}}</td>
                <td>{{ $blog->translation->title }}</td>
                <td>{!! Str::limit(strip_tags($blog->translation->description), 100) !!}</td>
                <td>{{ $blog->translation->language->lang }}</td>
                <td>{{ $blog->created_at ? $blog->created_at->format('Y/m/d') : 'bos' }}</td>
                <td style="text-align: center">
                    <a href="{{ route('blogedit', ['id' => $blog->id]) }}">
                        <i class="fa-duotone fa-pen-nib"></i>
                    </a>
                </td>
                <td style="text-align: center">
                    <a href="{{ route('blogdelete', ['id' => $blog->id]) }}">
                        <i class="fa-duotone fa-trash"></i>
                    </a>
                </td>
            </tr>
    @endforeach
    </tbody>
</table>

<script>
    document.getElementById('language').addEventListener('change', function() {
        var languageId = this.value;
        var rows = document.querySelectorAll('#blogTableBody tr');
        rows.forEach(function(row) {
            if (languageId === '') {
                row.style.display = 'table-row';
            } else {
                var langClass = 'language-' + languageId;
                row.style.display = row.classList.contains(langClass) ? 'table-row' : 'none';
            }
        });
    });
</script>
</body>

</html>
