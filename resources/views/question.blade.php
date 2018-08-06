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
                                        <div class="answer-pr">
                                            <h2>{{ $answer->procent }}%</h2>
                                            <p>{{ $answer->count }}</p>
                                        </div>
                                    </div>
                                @endforeach

                            </div>

                        </div>

                    </div>


                    <div class="col-sm-4 col-lg-3 hidden-xs">

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                        <div class="calendar-ev">
                            <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
                        </div>
                        <div id='calendar'></div>
                    </div>

                </div>
            </div>
        </section>

    </section>
@endsection