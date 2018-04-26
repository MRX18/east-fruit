@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">

                <link rel="stylesheet" href="../../css/style-items.css"/>
<div class="col-sm-8 col-lg-9">
    <div class="news-bredcrumbs-item">
        <ul>
            <li class="img-logo"><img src="../../images/page-item/Layer&#32;968.png" alt="Главная"></li>
            <li><a href="/">Главная</a></li>
            <li><img src="../../images/page-item/Polygon&#32;968.png" alt="/"></li>
            <li><a style="font-weight: normal;" href="{{ route('blog') }}">Блог</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <div class="user-article">
           <div class="img"> <img src="{{ asset('/images/uploads/events_logo.jpg.pagespeed.ce.b98GK-2iBh.jpg') }}" alt=""></div>
           <div class="text" style="margin-left: 20px;">
               <h3>РИСКИ И ПРОТИВОДЕЙСТВИЕ МОШЕННИЧЕСТВУ</h3>
               <span style="margin-top: 10px;" class="date-user">25.04.2018</span>
               <p style="margin-top: -10px;">Киев, Отель "Алфавито"</p>
           </div>
        </div>

        <div style="margin-top: 30px;" class="menu-calendar">
            <ul>
                <li><a class="date-active" href="#">О конференции</a></li>
                <li><a href="#">Программа</a></li>
                <li><a href="#">Спикеры</a></li>
                <li><a href="#">Участники</a></li>
                <li><a href="#">Фотоотчет</a></li>
            </ul>
        </div>

        <h2 class="title-item">О конференции</h2>

        <div class="descr-item">
            <p>Виталий Блажко, генеральный директор и основатель компании IT-Grand, в своем докладе "Коты должны ловить мышей, а системы безопасности - мошенников" рассказал об основных моментах технической организации контроля над мошенничеством в агрокомпании. Виталий привел практические примеры недочетов в построении системы безопасности, акцентировав внимание на степень ответственности и распределение функций различных служб агрокомпании в построение такой системы.</p>

            <p>Деловую атмосферу конференции разбавило яркое выступление профессионального иллюзиониста Андрея Кулинича. Ловкость рук - и никакого мошенничества! В руках Андрея пять карт превращались в колоду, а пластмассовое яйцо, в которое только что затолкали платок - в настоящее.</p>
        </div>

    </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">

                    <div class="entry-post">
                        <h3>Актуальное</h3>
                        <!-- Begin .item-->
                        <div id="w4" class="list-view">

                        @foreach($sitebarArticle as $sitebar)
                        <div data-key="43">
                            <div class="item">
                                <div class="item-image">
                                    <span class="item-image-date">{{ $sitebar->date }}</span>
                                    <!--<span class="item-image-time">09:30</span>-->
                                </div>
                                <div class="item-content">
                                    <p class="ellipsis"><a href="">{{ $sitebar->title }}</a></p>
                                    <div class="entry-meta bg-{{ rand(1,9) }}">
                                        @if($sitebar->visible == 1)
                                            {{ $sitebar->catigor }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="add-article" style="margin-bottom: 30px;">
                            <a href="{{ route('all-articles') }}">Все статьи</a>
                        </div>

                    </div></div>

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                </div>

            </div>
        </div>
    </section>

</section>
@endsection