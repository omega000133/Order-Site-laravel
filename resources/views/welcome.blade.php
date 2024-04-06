@extends('layouts.user')
@section('content')
    <main>
        <section class="fv">
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
                    @foreach ($news as $item)
                    <li class="wow fadeInUp" data-wow-delay=".5s">
                        <a href="{{route('notice.index', ['id' => $item->id])}}">
                            <span class="date">{{ $item -> news_date }}</span>
                            <span class="news_ttl">{{ $item -> news_title }}</span>
                        </a>
                    </li>
                    @endforeach
                </ul>
                <div class="wow fadeInUp" data-wow-delay=".5s">
                    <a href="{{route('notice.index', ['allData' => 'allNews'])}}" class="sec_btn">お知らせ一覧</a>
                </div>
            </div>
        </section>
    </main>
@endsection
