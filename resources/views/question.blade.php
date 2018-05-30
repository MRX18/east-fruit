@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">

                <link rel="stylesheet" href="../../css/style-items.css"/>
<div class="col-sm-8 col-lg-9">

    <div class="news-more-item">

        <h2 class="title-item">{{ $question->title }}</h2>

        <!-- <div class="img-item img-lid">
            <img src="" alt="">
        </div> -->

        <div class="descr-item">
            @foreach($answers as $answer)
            <div class="answer">
                <div class="answer-content">
                    <div class="answer-text">{{ $answer->title }}</div>
                    <div class="answer-line">
                        <div class="answer-sh" style="width: {{ $answer->procent }}%"></div>
                    </div>
                </div>
                <div class="answer-pr">{{ $answer->procent }}%</div>
            </div>
            @endforeach

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