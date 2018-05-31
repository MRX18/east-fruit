@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section"  style="margin-bottom: 20px;">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="wrapper-category">
                        <div>
                            <div class="calendar-news" style="display: block;">

                                @foreach($images as $image)
                                <a href="{{ route('image-article', ['id'=>$image->id]) }}" class="item">
                                    <div class="item-hover">
                                        <img src="{{ asset($image->img) }}"/>
                                    </div>
                                    <div class="item-img">
                                        <img src="{{ asset($image->img) }}"/>
                                    </div>
                                </a>
                                @endforeach

                            </div>
                        </div>
                        <div class="category-button">
                            {{ $images->links() }}
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