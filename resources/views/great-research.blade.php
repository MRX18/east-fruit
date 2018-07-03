@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="wrapper-category">
                        <div id="w0" class="news-reserch category-block">
                            
                            @foreach($articlesContent as $articleCont)
                                <div data-key="43">
                                    <div class="col-lg-4 col-md-4 col-sm-4 text-center art">
                                        <div class="item-category">
                                            <div class="item item-category-image">
                                                <div class="item-hover">
                                                    <a href="{{ route('min-research', ['id'=>$articleCont->id]) }}" class="search"></a>
                                                </div>
                                                <div class="item-img item-category-img">
                                                    <img src="{{ asset($articles->img) }}"/>
                                                </div>

                                            </div>


                                            <div style="float: left;" class="title">
                                                <h4 style="text-align: left;"><a href="{{ route('min-research', ['id'=>$articleCont->id]) }}">{{ $articles->title.'-'.$articleCont->title }}</a></h4>
                                            </div>


                                            <div style="float:left; color: #3c9; font-weight: 600;" class="item-category-date">
                                                {{ $articles->date }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                    </div>
                </div>

                </div>
                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">
                    <div class="calendar-ev">
                        <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
                    </div>
                    <div id='calendar'></div>

                    @if(isset($banner))
                        <div class="banner-category">
                            <img src="{{ asset($banner->img) }}" alt="Banner">
                        </div>
                    @endif

                    <div class="vote-block">
                        <h4>Опрос</h4>
                        <div id="section-vote">
                            <div class="question">{{ $question->title }}</div>
                            <div class="main">
                                <form action="{{ route('question') }}" method="post" name="web">
                                {{ csrf_field() }}
                                <div class="checkbox">
                                    @foreach($answer as $value)
                                    <label><input type="checkbox" name="answer{{ $value->id }}" value="{{ $value->id }}"> {{ $value->title }}</label>
                                    @endforeach
                                </div>

                                <button type="submit" class="btn btn-primary comment-add"> Голосовать</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <!-- <section id="slider-section">
        <div class="container">
            <div class="row no-gutter">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6 col-lg-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6 col-lg-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6 col-md-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->

</section>
@endsection