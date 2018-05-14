@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="wrapper-category">
                    
                    <div class="menu-calendar">
                        <ul>
                            <!-- <li><a class="date-active" href="#">2018</a></li> -->
                            @foreach($years as $year)
                            <li><a href="{{ route('event', ['id'=>$year->year]) }}">{{ $year->year }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="event-conteiner">
                        
                        @if(count($events) > 0) 
                            @foreach($events as $event)
                            <div class="event-article">
                                <header class="header-event">
                                    <h3><a href="{{ route('conference', ['id'=>$event->id]) }}">{{ $event->title }}</a></h3>
                                </header>
                                <div class="content-event">
                                    <div class="event-left">
                                        <div class="event-date">{{ $event->date }}</div>
                                        <div class="event-img">
                                            <img src="{{ asset($event->img) }}" alt="">
                                        </div>
                                        <div class="event-adres">{{ $event->adres }}</div>
                                    </div>
                                    <div class="event-right">
                                        <ul>
                                            <li><a href="{{ route('conference', ['id'=>$event->id]) }}">О конференции</a></li>
                                            <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа</a></li>
                                            <li><a href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <h3><span>На запрашиваемую дату событий нет!</span> Хотите посетить профильный семинар или конференцию? Посмотрите наш календарь ближайших событий.</h3>
                            @foreach($eventsAll as $event)
                            <div class="event-article">
                                <header class="header-event">
                                    <h3><a href="{{ route('conference', ['id'=>$event->id]) }}">{{ $event->title }}</a></h3>
                                </header>
                                <div class="content-event">
                                    <div class="event-left">
                                        <div class="event-date">{{ $event->date }}</div>
                                        <div class="event-img">
                                            <img src="{{ asset($event->img) }}" alt="">
                                        </div>
                                        <div class="event-adres">{{ $event->adres }}</div>
                                    </div>
                                    <div class="event-right">
                                        <ul>
                                            <li><a href="{{ route('conference', ['id'=>$event->id]) }}">О конференции</a></li>
                                            <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа</a></li>
                                            <li><a href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="category-button">
                        {{ $events->links() }}
                    </div>
                </div>

                </div>
                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">
                    <div id='calendar'></div>

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                    <div class="vote-block">
                        <h4>Опрос</h4>
                        <div id="section-vote">
                            <div class="question">Действует ли в Украини система дотаций АПК?</div>
                            <div class="main">

                                <div class="checkbox">
                                    <label><input type="checkbox"> Да, это очень действенный механизм поддержки сельхозпроизводителей.</label>
                                    <label><input type="checkbox"> Нет, все дотации получает только крупный бизнес.</label>
                                    <label><input type="checkbox"> В нашей стране это очередная схема присвоения бюджетных средств.</label>
                                </div>

                                <button type="button" class="btn btn-primary comment-add"> Голосовать</button>
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