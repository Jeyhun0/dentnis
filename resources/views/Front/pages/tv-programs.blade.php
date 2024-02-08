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
                        <iframe width="400" height="228" src="https://www.youtube.com/embed/RnZDMCzMwxI" title="Ollie - perfect timing" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                        <div class="video-title">
                            <b> Bir Günde Diş implantı Tedavisi Estetik Diş Hekimi Dr.Abdulkadir Narin Çook Yaşa 6 Şubat 2021 TV8 </b>
                        </div>
                    </div>
                @endfor

            </div>
        </div>
    </div>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/articles.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/tvPrograms.css')}}">
@endpush
