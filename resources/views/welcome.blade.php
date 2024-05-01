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
                            <a href="{{ route('notice.index', ['id' => $item->id]) }}">
                                <span class="date">{{ $item->news_date }}</span>
                                <span class="news_ttl">{{ $item->news_title }}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="wow fadeInUp" data-wow-delay=".5s">
                    <a href="{{ route('notice.index', ['allData' => 'allNews']) }}" class="sec_btn">お知らせ一覧</a>
                </div>
            </div>
        </section>
        <section class="news">
            <div class="wrap">
                <div class="movetextArea">
                    <h5 class="sec_ttl movetext">メニュー表</h5>
                </div>
                @if ($menu)
                    <ul class="news_list">
                        <li class="wow fadeInUp" data-wow-delay=".5s">
                            <a href={{ $menu->menu1 }} target="_blank">
                                <i class="menu-icon tf-icons mdi mdi-silverware"></i>
                                <span class="date">{{ $menu->month1 }}月のメニュー</span>
                            </a>
                        </li>
                        @if (!$menu->month2 == 0)
                            <li class="wow fadeInUp" data-wow-delay=".5s">
                                <a href={{ $menu->menu2 }} target="_blank">
                                    <i class="menu-icon tf-icons mdi mdi-silverware"></i>
                                    <span class="date">{{ $menu->month2 }}月のメニュー</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                @else
                    <ul class="news_list">
                        <li class="wow fadeInUp" data-wow-delay=".5s">
                            <a href="">
                                <i class="menu-icon tf-icons mdi mdi-silverware"></i>
                                <span class="date">メニューはありません。</span>
                            </a>
                        </li>
                    </ul>
                @endif
            </div>
        </section>
    </main>
    @if (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error('{{ session('error') }}');
            });
        </script>
    @endif
@endsection
