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
            <li><a style="font-weight: normal;" href="{{ route('cooperation') }}">Сотрудничество</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <h2 class="title-item">Сотрудничество</h2>

        <div class="descr-item">
            <p>EAST-FRUIT.com открыт к сотрудничеству с медиа-агентствами, СМИ, профильными ассоциациями, государственными и негосударственными структурами для улучшения эффективности торговли плодоовощной продукцией в регионе Кавказа, Центральной Азии и Восточной Европы.</p>
            
            <p>Как повысить эффективность использования ресурсов для выращивания высокоценных культур, которые могут быть экспортированы или реализованы на локальном рынке? Что необходимо для повышения конкурентоспособности на международных рынках и улучшения инвестиционного климата в плодоовощном секторе стран? На эти и другие вопросы аудитория сайта EAST-Fruit.com найдет ответ в новостях, обзорах рынка, исследованиях, мониторинге цен, анализе данных и различных моделей развития плодоовощного сектора, а также посредством профильных мероприятий (тренингов, семинаров, конференций) для плодоовощного бизнеса.</p>

      
        </div>

    </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs">
                    
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
                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a></p>
                <div class="entry-meta bg-{{ rand(1,9) }}">
                    @if($sitebar->visible == 1)
                        {{ $sitebar->catigor }}
                    @endif
                </div>
            </div>
        </div>
    </div>
    @endforeach

</div></div>

                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </section>

</section>
@endsection