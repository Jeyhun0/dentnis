<!DOCTYPE html>
<html lang="en">

@include('Front.partials.head')
<body>
    @include('Front.partials.navbar')
    @yield('content')

    @include('Front.partials.footer')

    @include('Front.partials.bottom')
    <div class="sosialMedia">
        <ul>
            <li><a href=""><img src="{{asset('assets/front/images/facebook.svg')}}" alt=""></a></li>
            <li><a href=""><img src="{{asset('assets/front/images/linkedin.svg')}}" alt=""></a></li>
            <li><a href=""><img src="{{asset('assets/front/images/instagram.svg')}}" alt=""></a></li>
            <li><a href=""><img src="{{asset('assets/front/images/youtube.svg')}}" alt=""></a></li>
        </ul>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="{{asset('assets/front/js/mainJs.js')}}"></script>
</body>
</html>

