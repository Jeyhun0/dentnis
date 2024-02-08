@extends('Front.Layouts.front')

@section('content')
    <div class="slider">
        <div id="image-container">
            @foreach(\App\Models\Slider::all() as $image)
                <a href="#"><img src="{{Storage::url ($image->image) }}" alt="Image {{ $image->id }}"
                                 class="{{ $loop->first ? 'active' : '' }}"></a>
            @endforeach

        </div>
        <div class="buttons">

            <button id="prevBtn" onclick="prevImage()"><</button>
            <button id="nextBtn" onclick="nextImage()"> ></button>
        </div>
    </div>
    <div class="section1">
        <h1>Estetik Diş Hekimliği</h1>
        <div class="row">
            @foreach($quotes as $quote)
                <div class="col">
                    <img src="{{Storage::url($quote->image)}}" alt="Image {{ $quote->id }}">

                    @foreach($translations as $translation)
                        @if($translation->quote_id == $quote->id)
                            <p class="title">{{ $translation->title }}</p>
                            <p>{!! Str::limit(strip_tags ($translation->description),100  ) !!}</p>
                        @endif
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
    <div class="containerSponsor">
        <div class="swiper mySwiper my">
            <div class="swiper-wrapper">
                @foreach($sponsors as $sponsor)
                    <div class="swiper-slide">
                        <div class="ust-padding">
                            <div class="for-padding">
                                <img src="{{$sponsor->image}}" alt="{{$sponsor->id}}">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    {{--        </div>--}}
    {{--    </div>--}}
    <!-- sponsor slider end -->
    <!-- YouTube start-->
    <div class="youtube">
        @foreach($youtubes as $youtube)
            <iframe width="918" height="450" src="{{ $youtube->url }}"
                    title="Dentnis İmplantoloji ve Estetik Diş Kliniği" frameborder="0"
                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                    allowfullscreen></iframe>
        @endforeach
    </div>
    <!-- YouTube end-->
    <!-- Ekibimiz start -->
    <div class="ekibimiz-container">
        <h1>Ekibimiz</h1>
        <div class="swiper-2 mySwiper my2">
            <div class="swiper-wrapper">
                @foreach($teams as $team)
                    <div class="swiper-slide mz">
                        <div class="top-section">
                            <img
                                src="{{Storage::url($team->image)}}"
                                alt="...">
                        </div>
                        <div class="bottom-section">
                            <h3 class="doctor-name">{{$team->title}}</h3>
                            <div class="ekibimiz-line"></div>
                            <h5 class="doctor-position">{{$team->translations->first()->position}}</h5>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>



    <!--Ekibimiz end-->
    <!--Estetik dis hekimligi start-->
    <div class="section2">
        <h2>Estetik Diş Hekimliği</h2>
        <div class="container1">
            @foreach($blogs as $blog)
                <div class="image-container">
                    <img src="{{$blog->image}}" alt="Image{{$blog->id}}"
                         style="width: 100%; height: 100%;">
                    <div class="image-overlay"></div>
                    <div class="image-title">{{$blog->translations->first()->title}}</div>
                    <div class="underline"></div>
                </div>
            @endforeach

        </div>
    </div>

    <!--Estetik dis hekimligi end-->
    <!--Article section start-->
    <div class="articles">
        <h2>Makaleler</h2>
        <div class="container1">
            @foreach($blogarticle as $article)
            <div class="col">
                <div class="image">
                    <img
                        src="{{$article->image}}"
                        alt="article image{{$article->id}}">
                </div>
                <div class="content">
                    <h2>{{$article->translations->first()->title}}</h2>
                    <p>{{$article->translations->first()->descriptions}}</p>
                    <button>Devamını oku</button>
                </div>
            </div>
            @endforeach
                </div>
            </div>

    <!--Article section end-->
@endsection
