@extends('Front.Layouts.front')

@section('content')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <div class="single-page">
        <div class="top">
            <p>Articles</p>
            <h1>{{ $category->first()->title }}</h1>
{{--            <img src="{{asset('assets/front/images/purple-background.png')}}" alt="">--}}
            <img src="{{ $blog->image }}" alt="{{ $category->first()->title }}">
        </div>
        <div class="container">
            <h2>{{ $category->first()->title }}</h2>
            <p>{{ $category->first()->description }}</p>
        </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/front/css/singlepage.css')}}">
@endpush
