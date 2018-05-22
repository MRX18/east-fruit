@extends('layouts.main')
@section('content')
<section id="main-section">
    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-4 col-lg-3 hidden-xs">
                    <div class="entry-post">
                        <h3>Актуальное</h3>
                        <!-- Begin .item-->
                        <div id="w0" class="list-view">

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
        <div class="add-article" style="margin-bottom: 30px;">
            <a href="{{ route('all-articles') }}">Больше новостей</a>
        </div>

</div>                    
</div>
</div>

                <div class="col-sm-8 col-lg-9">

                    <div class="col-sm-6 col-lg-3 visible-xs">

                        <div class="entry-post">
                            <h3>Актуальное</h3>
                            <!-- Begin .item-->
                            @foreach($sitebarAdaptive as $sitebar)
                            <div class="item">
                                <div class="item-image">
                                    <span class="item-image-date">{{ $sitebar->date }}</span>
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
                            @endforeach
                            <div class="add-article" style="margin-bottom: 30px;">
                                <a href="{{ route('all-articles') }}">Больше новостей</a>
                            </div>
                        </div>

                    </div>


                    <div class="news-bredcrumbs">
                        <div id="w1" class="news-stroke">
                            
                            @foreach($topSlider as $slid)
                            <div>
                                <div><a href="{{ route('article', ['id'=>$slid->slug]) }}">{{ mb_substr($slid->title,0,60).'...' }}</a></div>
                            </div>
                            @endforeach

                        </div>                
                    </div>
                    <div class="auth">
                        <ul>
                            @if(!Auth::check())
                        
                                <li> <a href="/login">Вход</a> </li>
                                <li> <a href="/register">Регистрация</a> </li>
                            @else
                                <li> <a href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a> </li>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif
                        </ul>
                    </div>

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
                                        <p><a style="color: #fff;" href="{{ route('article', ['id'=>$slid->slug]) }}">{{ $slid->title }}</a></p>
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
                                            <p><a style="color: #fff;" href="{{ route('article', ['id'=>$slid->slug]) }}">{{ $slid->title }}</a></p>
                                        </div>
                                        @endforeach
                                        <?php $i++;?>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <div class="news-slider-controls">
                                <!-- Left and right controls -->
                                <a class="carousel-control" href="index.html#newsSlider" data-slide="prev">
                                    <img src="images/arrowWhireLeft.png">
                                </a>
                                <a class="right carousel-control" href="index.html#newsSlider" data-slide="next">
                                    <img src="images/arrowWhireRight.png">
                                </a>
                                <div class="block-marquee">
                                    <div class="marquee"><span>{{ $line->title }}<i></i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="news-reserch">
                        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                            <h3>Исследования</h3>
                            <div id="w2" class="list-view" style="position: relative; z-index: 100;">

                                @foreach($researchs as $research)
                                <div data-key="32">
                                    <div class="item">
                                        <p style="text-shadow: 1px 1px 0px #000;">{{ $research->title }}</p>
                                        <a href="{{ route('article', ['id'=>$research->slug]) }}" class="item-hover">
                                            <div class="search"></div>
                                        </a>
                                        <div class="item-img">
                                            <img src="{{ asset($research->img) }}"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>                        
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 text-center border">
                            <h3>Технологии</h3>
                            <div id="w3" class="list-view" style="position: relative; z-index: 100;">

                                @foreach($technologys as $technology)
                                <div data-key="32">
                                    <div class="item">
                                        <p style="text-shadow: 1px 1px 10px #000;">{{ $technology->title }}</p>
                                        <a href="{{ route('article', ['id'=>$technology->slug]) }}" class="item-hover">
                                            <div class="search"></div>
                                        </a>
                                        <div class="item-img">
                                            <img src="{{ asset($technology->img) }}"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>                        
                        </div>

                        <div class="col-lg-4 col-md-4 col-sm-4 text-center">
                            <h3>Розничный аудит</h3>
                            <div id="w4" class="list-view" style="position: relative; z-index: 100;">

                                @foreach($retailAudits as $retailAudit)
                                <div data-key="32">
                                    <div class="item">
                                        <p style="text-shadow: 1px 1px 10px #000;">{{ $retailAudit->title }}</p>
                                        <a href="{{ route('article', ['id'=>$retailAudit->slug]) }}" class="item-hover">
                                            <div class="search"></div>
                                        </a>
                                        <div class="item-img">
                                            <img src="{{ asset($retailAudit->img) }}"/>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>                        
                        </div>
                    </div>
                    <div class="news-slick_slider">
                        <div class="news-comments-slick_slider-slider">
                            @foreach($interview as $value)
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="{{ asset($value->img) }}" />
                                </div>
                                <div class="news-team-item-text">
                                    <p>{{ $value->title }}</p>
                                    <span>{{ $value->date }}</span>
                                    <a href="{{ route('article', ['id'=>$value->slug]) }}">Читать</a>
                                </div>
                            </div>
                            @endforeach
                            <!-- <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="images/viktor.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="index.html">Читать</a>
                                </div>
                            </div>
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="images/657220.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="index.html">Читать</a>
                                </div>
                            </div>
                            <div class="news-team-item">
                                <div class="news-slick-item-img">
                                    <img src="images/viktor.jpg" />
                                </div>
                                <div class="news-team-item-text">
                                    <p class="name">Виктор Компанеец</p>
                                    <p>Эпоха аутсорсинга заканчивается</p>
                                    <span>03 МАР 09:30</span>
                                    <a href="index.html">Читать</a>
                                </div>
                            </div> -->
                        </div>
                        <script type="text/javascript">

                        </script>
                    </div>
                    <div class="news-history hidden-xs">
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Истории бизнеса</h3>
                            @if(isset($stories))
                            <div class="item">
                                <p>{{ $stories->title }}</p>
                                <div class="item-img">
                                    <img src="{{ asset($stories->img) }}"/>
                                </div>
                                <div class="item-link">
                                    <span>{{ $stories->date }}</span>
                                    <span class="arrow"></span>
                                </div>
                                <a href="{{ route('article', ['id'=>$stories->slug]) }}"><div class="hover"></div></a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Рейтинги</h3>
                            @if(isset($rating))
                            <div class="item">
                                <p>{{ $rating->title }}</p>
                                <div class="item-img">
                                    <img src="{{ asset($rating->img) }}"/>
                                </div>
                                <div class="item-link">
                                    <span>{{ $rating->date }}</span>
                                    <span class="arrow"></span>
                                </div>
                                <a href="{{ route('article', ['id'=>$rating->slug]) }}"><div class="hover"></div></a>
                            </div>
                            @endif
                        </div>
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Новости</h3>
                            @if(isset($new))
                            <div class="item">
                                <p>{{ $new->title }}</p>
                                <div class="item-img">
                                    <img src="{{ asset($new->img) }}"/>
                                </div>
                                <div class="item-link">
                                    <span>{{ $new->date }}</span>
                                    <span class="arrow"></span>
                                </div>
                                <a href="{{ route('article', ['id'=>$new->slug]) }}"><div class="hover"></div></a>
                            </div>
                            @endif
                        </div>
                    </div>

                    <div class="wrapper-category">
                        <div id="w0" class="news-reserch category-block">
                            
                            @foreach($articles as $article)
                            <div data-key="43">
                                <div class="col-lg-4 col-md-4 col-sm-4 text-center art">
                                    <div class="item-category">
                                        <div class="item item-category-image">
                                            <div class="item-hover">
                                                <a href="{{ route('article', ['id'=>$article->slug]) }}" class="search"></a>
                                            </div>
                                            <div class="item-img item-category-img">
                                                <img src="{{ asset($article->img) }}"/>
                                            </div>

                                        </div>

                                        <div class="entry-meta bg-{{ rand(1,9) }}">{{ $article->catigor }}</div>

                                        <div style="float: left;" class="title">
                                            <h4 style="text-align: left;"><a href="{{ route('article', ['id'=>$article->slug]) }}">{{ $article->title }}</a></h4>
                                        </div>


                                        <div style="float:left; color: #3c9; font-weight: 600;" class="item-category-date">
                                            {{ $article->date }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach

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
                                <p><a href="index.html">Подробнее</a></p>
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
                                <p><a href="index.html">Подробнее</a></p>
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
                                <p><a href="index.html">Подробнее</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <section id="calendar-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-6 col-lg-4 text-right">
                    <div id='calendar'></div>
                </div>
                <div class="col-sm-6 col-lg-8 hidden-xs img-cont">
                    <div class="calendar-news">

                        @foreach($images as $image)
                        <a href="{{ asset($image->img) }}" title="{{ $image->title }}" class="item">
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
                <!-- <div class="but">
                    <a class="image-but" href="{{ route('images') }}">Фотогалерея</a>
                </div> -->
                <!-- mobail -->
                <div class="col-sm-6 col-lg-8 visible-xs img-cont">
                    <div class="calendar-news">
                        @foreach($imagesM as $image)
                        <a href="{{ asset($image->img) }}" title="{{ $image->title }}" class="item">
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
                <div class="but">
                    <a class="image-but" href="{{ route('images') }}">Фотогалерея</a>
                </div>
            </div>
        </div>
    </section>
    <section id="org-section">
        <div class="container">
            <div class="row no-gutter">
                <h3>Организаторы</h3>
                <div class="col-sm-5 col-md-6 col-xs-6 text-right">
                    <div class="org-img">
                        <img src="images/Logo&#32;FAO.png" alt="" />
                    </div>
                </div>
                <div style="max-width: 250px;" class="col-sm-6 col-md-5 col-xs-6 col-md-offset-1">
                    <img style="width: 100%; margin-left: 20px;" src="images/ebrr_logo.jpg" alt="" />
                </div>
            </div>
        </div>
    </section>
    <section id="partners-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-6 col-md-5 text-right partners-text">
                    <p>Партнеры проекта:</p>
                </div>
                <div class="col-sm-6 col-md-2 col-xs-6 text-right">
                    <img src="images/UHA.png" alt="" />
                </div>
                <div class="col-sm-3 col-md-3 col-xs-6 text-center">
                    <img src="images/400x400&#32;(1).png" alt="" />
                </div>
            </div>
        </div>
    </section>
</section>
@endsection