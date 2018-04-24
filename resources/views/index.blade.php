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
                    <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->id]) }}">{{ mb_substr($sitebar->title, 0, 60)."..." }}</a></p>
                    <div class="entry-meta bg-{{ rand(1,9) }}">
                        @if($sitebar->visible == 1)
                            {{ $sitebar->catigor }}
                        @endif
                    </div>
                </div>
            </div>
        </div>
        @endforeach

</div>                    
</div>
</div>
                <div class="col-sm-8 col-lg-9">
                    <div class="news-bredcrumbs">
                        <div id="w1" class="news-stroke">
                            
                            @foreach($topSlider as $slid)
                            <div data-key="42" style="margin-right: 3px;">
                                <div><a href="{{ route('article', ['id'=>$slid->id]) }}">{{ mb_substr($slid->title,0,60).'...' }}</a></div>
                            </div>
                            @endforeach

                        </div>                
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
                            <div class="news-slider-controls">
                                <!-- Left and right controls -->
                                <a class="carousel-control" href="index.html#newsSlider" data-slide="prev">
                                    <img src="images/arrowWhireLeft.png">
                                </a>
                                <a class="right carousel-control" href="index.html#newsSlider" data-slide="next">
                                    <img src="images/arrowWhireRight.png">
                                </a>
                                <div class="block-marquee">
                                    <div class="marquee"><span>{{ $line->title }}<i>{{ $line->date }}</i></span></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 col-lg-3 visible-xs">

                        <div class="entry-post">
                            <h3>Актуальные</h3>
                            <!-- Begin .item-->
                            @foreach($sitebarAdaptive as $sitebar)
                            <div class="item">
                                <div class="item-image">
                                    <span class="item-image-date">{{ $sitebar->date }}</span>
                                </div>
                                <div class="item-content">
                                    <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->id]) }}">{{ $sitebar->title }}</a></p>
                                    <div class="entry-meta bg-{{ rand(1,9) }}">{{ $sitebar->catigor }}</div>
                                </div>
                            </div>
                            @endforeach
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
                                        <a href="{{ route('article', ['id'=>$research->id]) }}" class="item-hover">
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
                                        <a href="{{ route('article', ['id'=>$technology->id]) }}" class="item-hover">
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
                                        <a href="{{ route('article', ['id'=>$retailAudit->id]) }}" class="item-hover">
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
                            </div>
                        </div>
                        <script type="text/javascript">

                        </script>
                    </div>
                    <div class="news-history hidden-xs">
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Истории бизнеса</h3>
                            <div class="item">
                                <p>Истории успешного агробизнеса: Оксана Просоленко</p>
                                <div class="item-img">
                                    <img src="images/image_350x247.jpg"/>
                                </div>
                                <div class="item-link">
                                    <span>05 мар 09:30</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="hover"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Рейтинги</h3>
                            <div class="item">
                                <p>Истории успешного агробизнеса: Оксана Просоленко</p>
                                <div class="item-img">
                                    <img src="images/image_350x247.jpg"/>
                                </div>
                                <div class="item-link">
                                    <span>05 мар 09:30</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="hover"></div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4 text-center">
                            <h3>Цены</h3>
                            <div class="item">
                                <p>Истории успешного агробизнеса: Оксана Просоленко</p>
                                <div class="item-img">
                                    <img src="images/image_350x247.jpg"/>
                                </div>
                                <div class="item-link">
                                    <span>05 мар 09:30</span>
                                    <span class="arrow"></span>
                                </div>
                                <div class="hover"></div>
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
    </section>
    <section id="calendar-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-6 col-lg-4 text-right">
                    <div id='calendar'></div>
                </div>
                <div class="col-sm-6 col-lg-8 hidden-xs">
                    <div class="calendar-news">
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news7.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news7.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news5.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news5.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news2.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news2.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news8.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news8.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news4.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news4.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news9.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news9.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news6.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news6.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news6.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news6.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news4.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news4.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news5.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news5.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news1.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news1.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news6.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news6.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news5.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news5.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news8.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news8.jpg"/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-8 visible-xs">
                    <div class="calendar-news">
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news6.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news6.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news4.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news4.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news5.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news5.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news1.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news1.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news6.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news6.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news3.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news3.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news5.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news5.jpg"/>
                            </div>
                        </div>
                        <div class="item">
                            <div class="item-hover">
                                <img src="images/news8.jpg"/>
                                <div class="search"></div>
                            </div>
                            <div class="item-img">
                                <img src="images/news8.jpg"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="org-section">
        <div class="container">
            <div class="row no-gutter">
                <h3>Организаторы</h3>
                <div class="col-sm-5 col-md-6 col-xs-6 text-right">
                    <img src="images/Logo&#32;FAO.png" alt="" />
                </div>
                <div class="col-sm-6 col-md-5 col-xs-6 col-md-offset-1">
                    <img src="images/ebrr_logo.png" alt="" />
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