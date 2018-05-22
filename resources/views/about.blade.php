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
            <li><a style="font-weight: normal;" href="{{ route('about') }}">О проекте</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <h2 class="title-item">EAST- Fruit.com - аналитическая платформа для роста плодоовощного бизнеса</h2>

        <div class="img-item img-lid">
            <img src="{{ asset('/images/asdasd.jpg') }}" alt="">
        </div>

        <div class="descr-item">
            <p>Такие страны, как Грузия, Молдова, Таджикистан, Узбекистан относятся к странам теплого климата и обладают большими возможностями для развития цепочек добавленной стоимости в садоводстве, включая выращивание орехов, овощей и фруктов.</p>

            <p>Как повысить эффективность использования ресурсов для выращивания высокоценных культур, которые могут быть экспортированы или реализованы на локальном рынке? Что необходимо для повышения конкурентоспособности на международных рынках и улучшения инвестиционного климата в плодоовощном секторе стран? На эти и другие вопросы аудитория сайта EAST-Fruit.com найдет ответ в новостях, обзорах рынка, исследованиях, мониторинге цен, анализе данных и различных моделей развития плодоовощного сектора, а также посредством профильных мероприятий мероприятий (тренингов, семинаров, конференций), которые будут организованы в Грузии, Молдове, Таджикистане и Узбекистане.</p>

            <p>Платформа развития плодоовощного сектора предоставляет возможность международному бизнесу обмениваться знаниями, усилить достижения и улучшить деловые связи, а также способствует достижению важных результатов в развитии цепочек добавленной стоимости в плодоовощном секторе.</p>

            <p>Проект осуществляется Продовольственной и Сельскохозяйственной Организацией ООН (ФАО) и Европейским Банком Реконструкции и Развития (ЕБРР). Руководитель проекта, экономист инвестиционного центра ФАО Андрей Ярмак отмечает, что международная аналитическая платформа призвана улучшить эффективность торговли плодоовощной продукцией в регионе Кавказа, Центральной Азии и Восточной Европы, что приведет к повышению эффективности производства и качества продукции.</p>
      
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
                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title}}</a></p>
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