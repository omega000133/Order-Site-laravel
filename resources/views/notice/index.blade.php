@extends('layouts.user')
@section('content')
    <main>
        <section class="news news-single">
            <div class="wrap">
                <div class="movetextArea">
                    <h5 class="sec_ttl movetext">お知らせ</h5>
                </div>
                <ul class="news_list news_list1">
                    @foreach ($data as $item)
                        <li class="wow fadeInUp" data-wow-delay=".5s">
                            <p class="news_ttb">
                                {{ $item->news_date }}
                            </p>
                            <div class="news_ttc">
                                <p class="news_ttl">{{ $item->news_title }}</p>
                                <p class="news_ttm">{{ $item->news_content }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>
    </main>
@endsection
