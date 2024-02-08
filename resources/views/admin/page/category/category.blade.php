<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Table</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
</head>

<body>

<button style="margin-top: 10px; margin-left: 10px; background-color: #a0aec0">
    <a href="{{ route('catadd') }}">ADD</a>
</button>

<div>
    <label for="language">Select Language:</label>
    <select name="language" id="language">
        <option value="">All Languages</option>
        @foreach($languages as $language)
            <option value="{{$language->id}}">{{$language->lang}}</option>
        @endforeach
    </select>
</div>

<table class="table table-striped">
    <thead>
    <tr>
        <th>id</th>
        <th>name</th>
        <th>slug</th>
        <th>сategory_id</th>
        <th>Language</th>
        <th>Start Date</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody id="categoryTableBody">
    @foreach($adminCategories as $category)
        @foreach($category->translations as $translation)
            <tr class="language-{{$translation->language_id}}">
            <td>{{$category->id}}</td>
                <td>{{$translation->name}}</td>
                <td>{{$translation->slug}}</td>

                <td>{{$translation->category_id}}</td>
                <td>{{$translation->language ? $translation->language->lang : 'Unknown '}}</td>
                <td>{{$category->created_at ? $category->created_at->format('Y/m/d') : ''}}</td>
                <td style="text-align: center"><a href="{{route('editcategory',['id'=>$category->id])}}""><i class="fa-duotone fa-trash "></i>edit</a></td>
                <td style="text-align: center"><a href="{{route('categorydelete',['id'=>$category->id])}}""><i class="fa-duotone fa-trash "></i>delete</a></td>

            </tr>

        @endforeach
    @endforeach

    </tbody>
</table>

<script>
    document.getElementById('language').addEventListener('change', function() {
        var languageId = this.value;
        var rows = document.querySelectorAll('#categoryTableBody tr');
        rows.forEach(function(row) {
            if (languageId === '') {
                row.style.display = 'table-row';
            } else {
                var langClass = 'language-' + languageId;
                if (row.classList.contains(langClass)) {
                    row.style.display = 'table-row';
                } else {
                    row.style.display = 'none';
                }
            }
        });
    });
</script>
</body>
</html>
