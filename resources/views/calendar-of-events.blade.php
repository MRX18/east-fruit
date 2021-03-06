@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="wrapper-category">
                    <h1><a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a></h1>
                    <div class="menu-calendar">
                        <ul>
                            <!-- <li><a class="date-active" href="#">2018</a></li> -->
                            @foreach($years as $year)
                            <li><a href="{{ route('event', ['id'=>$year->year]) }}">{{ $year->year }}</a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="event-conteiner">
                        
                        @if(count($eventEastFruit) > 0 || count($eventOther) > 0) 
                            <div class="event-other">
                                <h2><a href="{{ route('event-catigor', ['id'=>'east-fruit']) }}">East Fruit</a></h2>
                                @foreach($eventEastFruit as $event)
                                <div class="event-article">
                                    <header class="header-event">
                                        <h3><a href="{{ route('conference', ['id'=>$event->id]) }}">{{ $event->title }}</a></h3>
                                    </header>
                                    <div class="content-event">
                                        <div class="event-left">
                                            <div class="event-date">
                                                @if(!isset($event->date_end))
                                                    {{ $event->date }}
                                                @else
                                                    {{ $event->date."-".date("d.m.Y", strtotime($event->date_end)) }}
                                                @endif
                                            </div>
                                            <div class="event-img">
                                                <img src="{{ asset($event->img) }}" alt="">
                                            </div>
                                            <div class="event-adres">{{ $event->adres }}</div>
                                        </div>
                                        <div class="event-right">
                                            <ul>
                                                <li><a href="{{ route('conference', ['id'=>$event->id]) }}">О событии</a></li>
                                                <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа события</a></li>
                                                <li><a href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
                                                <li><a href="{{ route('conference-materials', ['id'=>$event->id]) }}">Материалы конференции</a></li>
                                                <li><a href="{{ route('media-report', ['id'=>$event->id]) }}">Медиа-отчет</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                            <div class="event-other">
                                <h2><a href="{{ route('event-catigor', ['id'=>'other']) }}">Другие</a></h2>

                                @foreach($eventOther as $event)
                                <div class="event-article">
                                    <header class="header-event">
                                        <h3><a href="{{ route('conference', ['id'=>$event->id]) }}">{{ $event->title }}</a></h3>
                                    </header>
                                    <div class="content-event">
                                        <div class="event-left">
                                            <div class="event-date">
                                                @if(!isset($event->date_end))
                                                    {{ $event->date }}
                                                @else
                                                    {{ $event->date."-".date("d.m.Y", strtotime($event->date_end)) }}
                                                @endif
                                            </div>
                                            <div class="event-img">
                                                <img src="{{ asset($event->img) }}" alt="">
                                            </div>
                                            <div class="event-adres">{{ $event->adres }}</div>
                                        </div>
                                        <div class="event-right">
                                            <ul>
                                                <li><a href="{{ route('conference', ['id'=>$event->id]) }}">О событии</a></li>
                                                <li><a href="{{ route('program', ['id'=>$event->id]) }}">Программа события</a></li>
                                                <li><a href="{{ route('speakers', ['id'=>$event->id]) }}">Спикеры</a></li>
                                                <li><a href="{{ route('conference-materials', ['id'=>$event->id]) }}">Материалы конференции</a></li>
                                                <li><a href="{{ route('media-report', ['id'=>$event->id]) }}">Медиа-отчет</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
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
                                            <li><a href="{{ route('conference-materials', ['id'=>$event->id]) }}">Материалы конференции</a></li>
                                            <li><a href="{{ route('media-report', ['id'=>$event->id]) }}">Медиа-отчет</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif

                    </div>

                    <div class="category-button">
                        @if(count($eventEastFruit) > 9) 
                            {{ $eventEastFruit->links() }}
                        @elseif(count($eventOther) > 9)
                            {{ $eventOther->links() }}
                        @endif
                    </div>
                </div>

                </div>

                @include('includes.news-sitebar')

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