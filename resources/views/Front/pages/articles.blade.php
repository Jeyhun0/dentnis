@extends('Front.Layouts.front')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

@section('content')
    <div class="all">
        <div class="under-nav">
            <div class="content">
                <div class="top-title">
                    Makaleler
                </div>
                <div class="bottom-title">
                    <div class="bottom-left"><a href="">Anasayfa</a></div>
                    <div class="icon"> ></div>
                    <div class="bottom-right"><a href="">Makaleler</a></div>
                </div>
            </div>
        </div>


        <div class="container-article">
            <div class="all-article">
                @for($i = 0; $i < 12; $i++)
                    <div class="card" style="width: 18rem;">
                        <img src="{{asset('assets/front/images/purple-background.png')}}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h3 class="card-title">Card title</h3>
                            <p class="card-text"><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dolores earum, eius eum inventore molestiae nihil officia optio repellendus saepe, sed sit soluta vitae. Accusantium beatae et ipsam tempora voluptate?</span></p>
                            <a href="#" class="btn btn-primary">Devamını Oku</a>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/articles.css')}}">
@endpush
