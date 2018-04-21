@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="news-carousel">
                        <div id="newsSlider" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#newsSlider" data-slide-to="0" class="active"></li>
                                <li data-target="#newsSlider" data-slide-to="1"></li>
                                <li data-target="#newsSlider" data-slide-to="2"></li>
                            </ol>

                             <div class="carousel-inner">
                                <?php $i=1;?>
                                @foreach($slider as $slid)
                                <div class="item
                                @if($i == 1)
                                    active
                                @endif">
                                    <img src="{{ asset($slid->img) }}" />
                                    <div class="text" style="background-color: rgba(0,0,0,0.5); padding: 5px;">
                                        <span>{{ $slid->date }}</span>
                                        <p><a style="color: #fff;" href="{{ route('article', ['id'=>$slid->id]) }}">{{ mb_substr($slid->title, 0, 70).'...' }}</a></p>
                                    </div>
                                    <div class="items-more" data-slide-to="0">
                                        <?php $j=1;?>
                                        @foreach($slider as $slid)
                                        <div class="items-more-item 
                                        @if($i == $j)
                                            active
                                        @endif">
                                        <?php $j++;?>
                                            <span>{{ $slid->date }}</span>
                                            <p><a style="color: #fff;" href="{{ route('article', ['id'=>$slid->id]) }}">{{ mb_substr($slid->title, 0, 70).'...' }}</a></p>
                                        </div>
                                        @endforeach
                                        <?php $i++;?>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>
                    </div>

                    <div class="wrapper-category">
                        <div id="w0" class="news-reserch category-block">
                            
                            @foreach($articles as $article)
                            <div data-key="43">
                                <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                                    <div class="item-category">
                                        <div class="item item-category-image">
                                            <div class="item-hover">
                                                <a href="{{ route('article', ['id'=>$article->id]) }}" class="search"></a>
                                            </div>
                                            <div class="item-img item-category-img">
                                                <img src="{{ asset($article->img) }}"/>
                                            </div>

                                        </div>

                                        <div class="entry-meta bg-{{ rand(1,9) }}">{{ $article->catigor }}</div>

                                        <div style="float: left;" class="title">
                                            <h4 style="text-align: left;"><a href="{{ route('article', ['id'=>$article->id]) }}">{{ $article->title }}</a></h4>
                                        </div>


                                        <div style="float:left; color: #3c9; font-weight: 600;" class="item-category-date">
                                            {{ $article->date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                    </div>
                    <div class="category-button">
                        {{ $articles->links() }}
                    </div>
                </div>

<!--                     <div class="more-news-item">

                        <div class="item-news">
                            <div class="item-image">
                                <span class="item-image-date">05 МАР</span>
                            </div>
                            <div class="item-content">
                                <p class="ellipsis"><a href="index.html@id=3.html#">Песчаная буря</a></p>
                                <div class="entry-meta-descr">Сахара Астарта продала больше, но прибыль упала на четверть</div>
                            </div>
                        </div>

                        <div class="item-news">
                            <div class="item-image">
                                <span class="item-image-date">05 МАР</span>
                            </div>
                            <div class="item-content">
                                <p class="ellipsis"><a href="index.html@id=3.html#">6 апреля 20018 года</a></p>
                                <div class="entry-meta-descr">Как обещают организаторы, у участников будет возможность представить свои продукты и услуги перед более чем 150 посетителями. А у посетителей — ознакомиться с последними новинками.</div>
                            </div>
                        </div>

                        <div class="item-news">
                            <div class="item-image">
                                <span class="item-image-date">05 МАР</span>
                            </div>
                            <div class="item-content">
                                <p class="ellipsis"><a href="index.html@id=3.html#">мировые цены на чеснок обваляться из-за переизбытка продукции в Китае</a></p>
                                <div class="entry-meta-descr">В прошлом году значительное увеличение объемов валового урожая чеснока в Китае побудило фермеров нарастить производство этой культуры. «В результате 2017 год стал провальным для всего мирового рынка чеснока и несет в себе потенциальные риски», – говорит один из китайских трейдеров.</div>
                            </div>
                        </div>

                        <div class="item-news">
                            <div class="item-image">
                                <span class="item-image-date">05 МАР</span>
                            </div>
                            <div class="item-content">
                                <p class="ellipsis"><a href="index.html@id=3.html#">ежегодно в мире пропадает треть зерновых и половина овощей</a></p>
                                <div class="entry-meta-descr">Отмечается, что на Земле ежегодно пропадает 30% зерновых, 40-50% корнеплодов, фруктов и овощей, 20% мяса и 35% рыбы. Вес всех этих продуктов сравним с весом половины мирового урожая зерновых культур.</div>
                            </div>
                        </div>

                        <div class="item-news">
                            <div class="item-image">
                                <span class="item-image-date">05 МАР</span>
                            </div>
                            <div class="item-content">
                                <p class="ellipsis"><a href="index.html@id=3.html#">слияние Bayer и Monsanto на несколько месяцев притормозили США</a></p>
                                <div class="entry-meta-descr">По словам двух спикеров, хорошо знакомых с данным вопросом, план Bayer AG получить антимонопольное одобрение на поглощение Monsanto Co не удовлетворил должностных лиц США. Они обеспокоены тем, что слияние может нанести ущерб конкуренции, сообщает Bloomberg.</div>
                            </div>
                        </div>

                    </div> -->

                </div>
                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">
                    <div id='calendar'></div>

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                    <!--<div class="news-slick_slider">
                        <div class="news-comments-slick_slider-slider">
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="/images/viktor.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="">Читать</a>
                                </div>
                            </div>
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="/images/viktor.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="">Читать</a>
                                </div>
                            </div>
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="/images/657220.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="">Читать</a>
                                </div>
                            </div>
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="/images/viktor.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="">Читать</a>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            /*$('.news-comments-slick_slider-slider').slick({
                                dots: false,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 1,
                                slidesToScroll: 1,
                                autoplay: false,
                                responsive: [
                                    {
                                        breakpoint: 600,
                                        settings: {
                                            slidesToShow: 1,
                                            slidesToScroll: 1,
                                            infinite: true,
                                            dots: true
                                        }
                                    }]
                            });*/
                        </script>
                    </div>-->

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

    <section id="slider-section">
        <div class="container">
            <div class="row no-gutter">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
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
    </section>

</section>
@endsection