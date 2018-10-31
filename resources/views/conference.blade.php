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
            <li class="img-logo"><img src="../../images/page-item/Layer-968.png" alt="Главная"></li>
            <li><a href="/">Главная</a></li>
            <li><img src="../../images/page-item/Polygon-968.png" alt="/"></li>
            <li><a style="font-weight: normal;" href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <div class="user-article">
           <div class="img"> <img src="{{ asset($event->img) }}" alt=""></div>
           <div class="text" style="margin-left: 20px;">
               <h3>{{ $event->title }}</h3>
               <span style="margin-top: 10px;" class="date-user">
                   @if(!isset($event->date_end))
                       {{ $event->date }}
                   @else
                       {{ $event->date."-".date("d.m.Y", strtotime($event->date_end)) }}
                   @endif
               </span>
               <p style="margin-top: -10px;">{{ $event->adres }}</p>
           </div>
        </div>

        <div style="margin-top: 30px;" class="menu-calendar">
            <ul>
                <li><a class="date-active" href="{{ route('conference', ['id'=>$event->id]) }}">О событии</a></li>
                <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа события</a></li>
                <li><a href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
                <li><a href="{{ route('conference-materials', ['id'=>$event->id]) }}">Материалы конференции</a></li>
                <li><a href="{{ route('media-report', ['id'=>$event->id]) }}">Медиа-отчет</a></li>
            </ul>
        </div>

        <h2 class="title-item">О конференции</h2>

        <div class="descr-item">
            @if(isset($conference))
                {!! $conference->text !!}
            @else
                <h3><span>Материалы скоро появятся на сайте!</span></h3>
            @endif
        </div>

    </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">

                    @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                </div>

            </div>
        </div>
    </section>

</section>
@endsection