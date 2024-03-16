@extends('layouts.user')
@section('content')
    <main>
        <section class="fv">
            {{-- <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="./assets/img/slider1.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/img/slider2.jpg" alt="">
                    </div>
                    <div class="swiper-slide">
                        <img src="./assets/img/slider3.jpg" alt="">
                    </div>
                </div>
                <div class="text">
                    <h1 class="wow fadeInUp" data-wow-delay=".5s">成田高等学校付属小学校</h1>
                    <h2 class="wow fadeInUp" data-wow-delay=".8s">お弁当注文サイト</h2>
                </div>
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div> --}}
            <figure class="fv-img">
                <img src="./assets/img/fv.png" alt="成田高等学校付属小学校お弁当注文サイト">
            </figure>
        </section>
        <section class="news">
            <div class="wrap">
                <div class="movetextArea">
                    <h5 class="sec_ttl movetext">お知らせ</h5>
                </div>
                <ul class="news_list">
                    <li class="wow fadeInUp" data-wow-delay=".5s">
                        <a href="">
                            <span class="date">2024.00.00</span>
                            <span class="news_ttl">ホームページ公開いたしました。</span>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay=".5s">
                        <a href="">
                            <span class="date">2024.00.00</span>
                            <span class="news_ttl">ホームページ公開いたしました。</span>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay=".5s">
                        <a href="">
                            <span class="date">2024.00.00</span>
                            <span class="news_ttl">ホームページ公開いたしました。</span>
                        </a>
                    </li>
                    <li class="wow fadeInUp" data-wow-delay=".5s">
                        <a href="">
                            <span class="date">2024.00.00</span>
                            <span class="news_ttl">ホームページ公開いたしました。</span>
                        </a>
                    </li>
                </ul>
                <div class="wow fadeInUp" data-wow-delay=".5s">
                    <a href="" class="sec_btn">お知らせ一覧</a>
                </div>
            </div>
        </section>
    </main>
@endsection
