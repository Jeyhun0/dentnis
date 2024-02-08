<div class="header">
    <ul class="container1">
        <div class="image">
            <img src="https://dentnis.com/wp-content/uploads/2022/06/dentnis-logo-2.svg" alt="logo">
        </div>
        <div>
            @php
                $currentLocale = session()->get('locale');

                if ($currentLocale === null) {
                    $currentLocale = 'tr';
                }
            @endphp
            <ul class="navbar">
                @foreach ($categories as $category)
                    <li>
                        <a href="{{url($category->translations->first()->slug ?? '')}}">
{{--                            {{ $blog->translation->name }}--}}
                            <span>{{ $category->translations->first()->name }}</span>
                        </a>
                    <ul>
                    @foreach($category->blogs as $blog)
                        <li>
                            <a href="{{route('category.show', ['slug'=>$blog->slug])}}">{{ $blog->translations->first()->title }}

</a>
                    </li>
                        @endforeach
                </ul>
                    </li>
                @endforeach

             <li>
                    <li>
                        <a href='{{route('about.index')}}'  ><span class="toggle-menu2">{{ ('Hakkımızda') }}</span><i class="toggle-icon"></i> </a>
                        <ul class="submenu">
                            @foreach ($aboutMenu as $menu)
                                @if ($menu->translations->isNotEmpty())
                                    <li>
                                        <a href="{{$menu->slug}}">{{ $menu->translations->first()->title  }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </li>
                    <li>
                        <a href='{{route('front.contact')}}'><span>{{('İletişim') }}</span> </a>
                    </li>
                    @foreach($languageIcon as $language)
                        <a href="{{ route('locale.set', $language->lang) }}" class="lang {{ $currentLocale === $language->lang ? 'd-none' : '' }}">
                            <img style="width: 50px" src="{{ asset('storage/'. $language->image) }}" alt="{{ $language->lang }}" id="{{ $language->lang }}">
                        </a>
                    @endforeach
            </ul>
            <a href=""><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
    </ul>
</div>
