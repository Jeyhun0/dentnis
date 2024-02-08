@extends('Front.Layouts.front')

@section('content')
    <div class="contact">
        <div class="subheader">
            <div class="container">
                <div class="columnOne">
                        <h1>İletisim</h1>
                        <ul>
                            <li><a href="">Anasayfa</a></li>
                            <span><i class="fa-solid fa-angle-right"></i></span>
                            <li><a href="">İletisim</a></li>
                        </ul>
                </div>
            </div>
        </div>
        <div class="section1">
            <div class="row1">
                <form action="">
                    <div class="flex">
                        <input type="text" name="firstname" placeholder="Ad, Soyad">
                        <input type="number" name="phone" placeholder="Phone">
                    </div>
                    <input type="email" name="email" placeholder="Email">
                    <input type="text" name="title" placeholder="Konu">
                    <textarea cols="40" rows="5" name="mesaj" placeholder="Mesaj"></textarea>
                    <label for="">
                        <input type="checkbox">
                        <a href=""> KVKK</a>'yı okudum, kabul ediyorum.
                    </label>
                    <button>Gönder</button>
                </form>

                <div class="errMessage">
                    Bir veya daha fazla alanda hata bulundu. Lütfen kontrol edin ve tekrar deneyin.
                </div>
            </div>
            <div class="row2">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d16491.755351405183!2d49.86224668359764!3d40.38313033265291!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1saz!2saz!4v1705053966399!5m2!1saz!2saz" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
        <div class="section2">
            <div class="row1">
                <h3>İletişim Bilgileri</h3>
                <p> <strong>Adres:</strong> Valikonağı Caddesi, Narin Apartmanı, No:167/4 Nişantaşı – Şişli / istanbul </p>
                <p> <strong>Telefon:</strong> <a href="">+90 (212) 246 09 03</a> </p>
                <p> <strong>Mail:</strong> <a href="">info@dentnis.com</a> </p>
                <p> <strong>instagram:</strong> <a href="">@doktornarin</a> </p>
            </div>
            <span>

            <div class="row2">
            </span>
                <h3>Çalışma Saatleri</h3>
                <p><strong>Pazartesi – Cumartesi:</strong> 08.30 – 19.00<br>
                    <strong>Pazar:</strong> Kapalı
                </p>
            </div>
        </div>


    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('assets/front/css/contact.css')}}">
@endpush
