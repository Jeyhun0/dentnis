<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Team Table</title>
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    <link
        rel="stylesheet"
        data-purpose="Layout StyleSheet"
        title="Web Awesome"
        href="/css/app-wa-612dd696ed96d6777d290343ca9cef9d.css?vsn=d"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/all.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-thin.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-solid.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-regular.css"
    >

    <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.5.1/css/sharp-light.css"
    >

</head>

<body>

<button style="margin-top: 10px; margin-left: 10px; background-color: #a0aec0">
    <a href="{{ route('add') }}">ADD</a>
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
        <th>Edit</th>
        <th>Id</th>
        <th>Img</th>
        <th>Title</th>
        <th>position</th>
        <th>Language</th>
        <th>Start_date</th>
        <th>Delete</th>
    </tr>
    </thead>
    <tbody id="blogTableBody">
    @foreach($teams as $team)
        @foreach($team->translations as $translation)
            <tr class="language-{{$translation->language_id}}">
                <td style="text-align: center"><a href="{{route('edit',['id'=>$team->id])}}"><i class="fa-duotone fa-pen-nib"></i></a></td>
                <td>{{$team->id}}</td>
                <td><img src="{{Storage::url($team->image)}}" alt="image{{$team->id}}"></td>
                <td>{{$team->title}}</td>
                <td>{{$translation->position}}</td>
                <td>{{$translation->language->lang}}</td>
                <td>{{$team->created_at ? $team->created_at->format('Y/m/d') : ''}}</td>
                <td style="text-align: center"><a href="{{route('delete',['id'=>$team->id])}}"><i class="fa-duotone fa-trash"></i></a></td>
            </tr>
        @endforeach
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

