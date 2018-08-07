@extends('layouts.main')
@section('content')
    <section id="main-section">
        <section id="news-section">
            <div class="container">
                <div class="row no-gutter">
                    <div class="col-sm-4 col-lg-3 hidden-xs">
                        <!-- Begin MailChimp Signup Form -->
                        <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet"
                              type="text/css">
                        <style type="text/css">
                            #mc_embed_signup {
                                background: #fff;
                                clear: left;
                                font: 14px Helvetica, Arial, sans-serif;
                            }

                            /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                               We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                        </style>
                        <div id="mc_embed_signup" style="margin-top: -30px;">
                            <form action="https://east-fruit.us18.list-manage.com/subscribe/post?u=1f5fa0f4967175e9e576cb0ca&amp;id=6e49ceab61"
                                  method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                  class="validate" target="_blank" novalidate>
                                <div id="mc_embed_signup_scroll">
                                    <h2 style="font-weight: bold; font-size: 20px;
    margin-bottom: 3px; color: #212840;">Подпишитесь на обновление наших материалов</h2>
                                    <div class="mc-field-group">
                                        <label for="mce-EMAIL" style="color: #30C593;">Адрес электронной почты <span
                                                    class="asterisk">*</span>
                                        </label>
                                        <input type="email" value="" name="EMAIL" class="required email" id="mce-EMAIL">
                                    </div>
                                    <div style="margin-top: -10px;" id="mce-responses" class="clear">
                                        <div class="response" id="mce-error-response" style="display:none"></div>
                                        <div class="response" id="mce-success-response" style="display:none"></div>
                                    </div>
                                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                                type="text" name="b_1f5fa0f4967175e9e576cb0ca_6e49ceab61" tabindex="-1"
                                                value=""></div>
                                    <div class="clear"><input style="background-color: #262D49;" type="submit"
                                                              value="Подписаться" name="subscribe"
                                                              id="mc-embedded-subscribe" class="button"></div>
                                </div>
                            </form>
                        </div>
                        <script type='text/javascript'
                                src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                        <script type='text/javascript'>(function ($) {
                                window.fnames = new Array();
                                window.ftypes = new Array();
                                fnames[0] = 'EMAIL';
                                ftypes[0] = 'email';
                                fnames[1] = 'FNAME';
                                ftypes[1] = 'text';
                                fnames[2] = 'LNAME';
                                ftypes[2] = 'text';
                                fnames[3] = 'ADDRESS';
                                ftypes[3] = 'address';
                                fnames[4] = 'PHONE';
                                ftypes[4] = 'phone';
                                fnames[5] = 'BIRTHDAY';
                                ftypes[5] = 'birthday';
                            }(jQuery));
                            var $mcj = jQuery.noConflict(true);</script>
                        <!--End mc_embed_signup-->

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                        <div class="entry-post">
                            <h3>Последние комментарии</h3>

                            @foreach($sitebarComment as $comment)
                            <div class="comment-sitebar">
                                <div class="comment-article"><a href="{{ $comment->article_slug }}">{{ $comment->article_title }}</a></div>
                                <div class="comment-content">
                                    <p><span>{{ $comment->user }}</span>{!! mb_substr($comment->text, 0, 150)."..." !!}</p>
                                </div>
                            </div>
                            @endforeach

                        </div>


                    </div>

                    <div class="col-sm-8 col-lg-9">

                        <div class="col-sm-6 col-lg-3 visible-xs">
                            <!-- Begin MailChimp Signup Form -->
                            <link href="//cdn-images.mailchimp.com/embedcode/classic-10_7.css" rel="stylesheet"
                                  type="text/css">
                            <style type="text/css">
                                #mc_embed_signup {
                                    background: #fff;
                                    clear: left;
                                    font: 14px Helvetica, Arial, sans-serif;
                                }

                                /* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
                                   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
                            </style>
                            <div id="mc_embed_signup" style="margin-top: -30px;">
                                <form action="https://east-fruit.us18.list-manage.com/subscribe/post?u=1f5fa0f4967175e9e576cb0ca&amp;id=6e49ceab61"
                                      method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form"
                                      class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll">
                                        <h2 style="font-weight: bold; font-size: 20px;
    margin-bottom: 3px; color: #212840;">Подпишитесь на обновление наших материалов</h2>
                                        <div class="mc-field-group">
                                            <label for="mce-EMAIL" style="color: #30C593;">Адрес электронной почты <span
                                                        class="asterisk">*</span>
                                            </label>
                                            <input type="email" value="" name="EMAIL" class="required email"
                                                   id="mce-EMAIL">
                                        </div>
                                        <div style="margin-top: -10px;" id="mce-responses" class="clear">
                                            <div class="response" id="mce-error-response" style="display:none"></div>
                                            <div class="response" id="mce-success-response" style="display:none"></div>
                                        </div>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div style="position: absolute; left: -5000px;" aria-hidden="true"><input
                                                    type="text" name="b_1f5fa0f4967175e9e576cb0ca_6e49ceab61"
                                                    tabindex="-1" value=""></div>
                                        <div class="clear"><input style="background-color: #262D49;" type="submit"
                                                                  value="Подписаться" name="subscribe"
                                                                  id="mc-embedded-subscribe" class="button"></div>
                                    </div>
                                </form>
                            </div>
                            <script type='text/javascript'
                                    src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script>
                            <script type='text/javascript'>(function ($) {
                                    window.fnames = new Array();
                                    window.ftypes = new Array();
                                    fnames[0] = 'EMAIL';
                                    ftypes[0] = 'email';
                                    fnames[1] = 'FNAME';
                                    ftypes[1] = 'text';
                                    fnames[2] = 'LNAME';
                                    ftypes[2] = 'text';
                                    fnames[3] = 'ADDRESS';
                                    ftypes[3] = 'address';
                                    fnames[4] = 'PHONE';
                                    ftypes[4] = 'phone';
                                    fnames[5] = 'BIRTHDAY';
                                    ftypes[5] = 'birthday';
                                }(jQuery));
                                var $mcj = jQuery.noConflict(true);</script>
                            <!--End mc_embed_signup-->
                            <div class="entry-post">
                                <h3>Актуальное</h3>
                                <!-- Begin .item-->
                                @foreach($sitebarAdaptive as $sitebar)
                                    <div class="item">
                                        <div class="item-image">
                                            <span class="item-image-date">{{ $sitebar->date }}</span>
                                        </div>
                                        <div class="item-content">
                                            <p class="ellipsis"><a
                                                        href="{{ $sitebar->slug }}">{{ $sitebar->title }}</a>
                                            </p>
                                            <div class="entry-meta bg-{{ $sitebar->id_catigories }}">
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
                                        <div>
                                            <a href="{{ route('article', ['id'=>$slid->slug]) }}">{{ mb_substr($slid->title,0,60).'...' }}</a>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                        <div class="auth">
                            <ul>
                                @if(!Auth::check())

                                    <li><a href="/login">Вход</a></li>
                                    <li><a href="/register">Регистрация</a></li>
                                @else
                                    <li><a href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a></li>
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
                                    <?php $i = 1;?>
                                    @foreach($slider as $slid)
                                        <div class="item
                                @if($i == 1)
                                                active
@endif">
                                            <img src="{{ asset($slid->img) }}" alt="{{ $slid->title }}"/>
                                            <div class="text" style="background-color: rgba(0,0,0,0.5); padding: 5px;">
                                                <span>{{ $slid->date }}</span>
                                                <p><a style="color: #fff;"
                                                      href="{{ route('article', ['id'=>$slid->slug]) }}">{{ $slid->title }}</a>
                                                </p>
                                            </div>
                                            <div class="items-more" data-slide-to="0">
                                                <?php $j = 1;?>
                                                @foreach($slider as $slid)
                                                    <div class="items-more-item
                                        @if($i == $j)
                                                            active
@endif">
                                                        <?php $j++;?>
                                                        <span>{{ $slid->date }}</span>
                                                        <p><a style="color: #fff;"
                                                              href="{{ route('article', ['id'=>$slid->slug]) }}">{{ $slid->title }}</a>
                                                        </p>
                                                    </div>
                                                @endforeach
                                                <?php $i++;?>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!--<div class="news-slider-controls">-->
                                <!-- Left and right controls -->
                                <!-- <a class="carousel-control" href="index.html#newsSlider" data-slide="prev">
                            <!--        <img src="images/arrowWhireLeft.png">-->
                                <!--    </a>-->
                                <!--    <a class="right carousel-control" href="index.html#newsSlider" data-slide="next">-->
                                <!--        <img src="images/arrowWhireRight.png">-->
                                <!--    </a> -->
                                <!--    <div class="block-marquee">-->
                            <!--        <div class="marquee"><span><a href="{{ route('article', ['id'=>$line->slug]) }}">{{ $line->title }}</a><i></i></span></div>-->
                                <!--    </div>-->
                                <!--</div>-->
                            </div>
                        </div>

                        <!--<div class="news-reserch">-->
                        <!--    <div class="col-lg-4 col-md-4 col-sm-4 text-center">-->
                    <!--        <h3 class="catigor-title-top"><a href="{{ route('research') }}">Исследования</a></h3>-->
                        <!--        <div id="w2" class="list-view" style="position: relative; z-index: 100;">-->

                    <!--            @foreach($researchs as $research)-->
                        <!--            <div data-key="32">-->
                        <!--                <div class="item">-->
                    <!--                    <p style="text-shadow: 1px 1px 0px #000;">{{ $research->title }}</p>-->
                    <!--                    @if($research->size == 1)-->
                    <!--                    <a href="{{ route('great-research', ['id'=>$research->slug]) }}" class="item-hover">-->
                        <!--                    @else-->
                    <!--                    <a href="{{ route('min-research', ['id'=>$research->id]) }}" class="item-hover">-->
                        <!--                    @endif-->
                        <!--                        <div class="search"></div>-->
                        <!--                    </a>-->
                        <!--                    <div class="item-img">-->
                    <!--                        <img src="{{ asset($research->img) }}"/>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            @endforeach-->

                        <!--        </div>                        -->
                        <!--    </div>-->

                        <!--    <div class="col-lg-4 col-md-4 col-sm-4 text-center border">-->
                    <!--        <h3  class="catigor-title-top"><a href="{{ route('catigor', ['id'=>'technologies']) }}">Технологии</a></h3>-->
                        <!--        <div id="w3" class="list-view" style="position: relative; z-index: 100;">-->

                    <!--            @foreach($technologys as $technology)-->
                        <!--            <div data-key="32">-->
                        <!--                <div class="item">-->
                    <!--                    <p style="text-shadow: 1px 1px 10px #000;">{{ $technology->title }}</p>-->
                    <!--                    <a href="{{ route('article', ['id'=>$technology->slug]) }}" class="item-hover">-->
                        <!--                        <div class="search"></div>-->
                        <!--                    </a>-->
                        <!--                    <div class="item-img">-->
                    <!--                        <img src="{{ asset($technology->img) }}"/>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            @endforeach-->

                        <!--        </div>                        -->
                        <!--    </div>-->

                        <!--    <div class="col-lg-4 col-md-4 col-sm-4 text-center">-->
                    <!--        <h3 class="catigor-title-top"><a href="{{ route('catigor', ['id'=>'retail-audit']) }}">Розничный аудит</a></h3>-->
                        <!--        <div id="w4" class="list-view" style="position: relative; z-index: 100;">-->

                    <!--            @foreach($retailAudits as $retailAudit)-->
                        <!--            <div data-key="32">-->
                        <!--                <div class="item">-->
                    <!--                    <p style="text-shadow: 1px 1px 10px #000;">{{ $retailAudit->title }}</p>-->
                    <!--                    <a href="{{ route('article', ['id'=>$retailAudit->slug]) }}" class="item-hover">-->
                        <!--                        <div class="search"></div>-->
                        <!--                    </a>-->
                        <!--                    <div class="item-img">-->
                    <!--                        <img src="{{ asset($retailAudit->img) }}"/>-->
                        <!--                    </div>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--            @endforeach-->

                        <!--        </div>                        -->
                        <!--    </div>-->
                        <!--</div>-->
                        <div class="news-slick_slider">
                            <div class="news-comments-slick_slider-slider">
                                @foreach($interview as $value)
                                    <div class="news-team-item">
                                        <div class="news-slick-item-img">
                                            <img src="{{ asset($value->img) }}" alt="{{ $value->title }}"/>
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
                            <div class="col-md-12 col-lg-4 text-center catigor-conteiner-bottom">
                                <h3 class="catigor-title-bottom"><a
                                            href="{{ route('catigor', ['id'=>'business-history']) }}">Истории
                                        бизнеса</a></h3>
                                @if(isset($stories))
                                    <div class="item">
                                        <p>{{ $stories->title }}</p>
                                        <div class="item-img">
                                            <img src="{{ asset($stories->img) }}" alt="{{ $stories->title }}"/>
                                        </div>
                                        <div class="item-link">
                                            <span>{{ $stories->date }}</span>
                                            <span class="arrow"></span>
                                        </div>
                                        <a href="{{ route('article', ['id'=>$stories->slug]) }}">
                                            <div class="hover"></div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-4 text-center catigor-conteiner-bottom">
                                <h3 class="catigor-title-bottom"><a href="{{ route('catigor', ['id'=>'ratings']) }}">Рейтинги</a>
                                </h3>
                                @if(isset($rating))
                                    <div class="item">
                                        <p>{{ $rating->title }}</p>
                                        <div class="item-img">
                                            <img src="{{ asset($rating->img) }}" alt="{{ $rating->title }}"/>
                                        </div>
                                        <div class="item-link">
                                            <span>{{ $rating->date }}</span>
                                            <span class="arrow"></span>
                                        </div>
                                        <a href="{{ route('article', ['id'=>$rating->slug]) }}">
                                            <div class="hover"></div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-12 col-lg-4 text-center catigor-conteiner-bottom">
                                <h3 class="catigor-title-bottom"><a href="{{ route('catigor', ['id'=>'news']) }}">Новости</a>
                                </h3>
                                @if(isset($new))
                                    <div class="item">
                                        <p>{{ $new->title }}</p>
                                        <div class="item-img">
                                            <img src="{{ asset($new->img) }}" alt="{{ $new->title }}"/>
                                        </div>
                                        <div class="item-link">
                                            <span>{{ $new->date }}</span>
                                            <span class="arrow"></span>
                                        </div>
                                        <a href="{{ route('article', ['id'=>$new->slug]) }}">
                                            <div class="hover"></div>
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="wrapper-category">
                            <div class="news-reserch category-block">

                                @foreach($articles as $article)
                                    <div data-key="43">
                                        <div class="col-lg-4 col-md-4 col-sm-4 text-center art">
                                            <div class="item-category">
                                                <div class="item item-category-image">
                                                    <div class="item-hover">
                                                        <a href="{{ route('article', ['id'=>$article->slug]) }}"
                                                           class="search"></a>
                                                    </div>
                                                    <div class="item-img item-category-img">
                                                        <img src="{{ asset($article->img) }}"
                                                             alt="{{ $article->title }}"/>
                                                    </div>

                                                </div>

                                            <!--<div class="entry-meta bg-{{ $article->id_catigories }}">{{ $article->catigor }}</div> -->

                                                <div style="float: left;" class="title">
                                                    <h4 style="text-align: left;"><a
                                                                href="{{ route('article', ['id'=>$article->slug]) }}">{{ $article->title }}</a>
                                                    </h4>
                                                </div>


                                                <div style="float:left; color: #3c9; font-weight: 600;"
                                                     class="item-category-date">
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
            </div>
        </section>

        @if(count($video) > 0)
            <section id="slider-section">
                <div class="container">
                    <div class="row no-gutter">
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">

                            <ol class="carousel-indicators">
                                @foreach($video as $value)
                                    @if($value->active == 0)
                                        <li data-target="#myCarousel" data-slide-to="{{ $value->active }}"
                                            class="active"></li>
                                    @else
                                        <li data-target="#myCarousel" data-slide-to="{{ $value->active }}"></li>
                                    @endif
                                @endforeach
                            </ol>

                            <div class="carousel-inner">

                                @foreach($video as $value)
                                    @if($value->active == 0)
                                        <div class="item active">
                                            @else
                                                <div class="item">
                                                    @endif

                                                    <div class="col-sm-6 col-lg-6 text">
                                                        <div class="video-container">
                                                            {!! $value->video !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6 col-lg-6 text">
                                                        <h3>{{ $value->title }}</h3>
                                                        <p>{{ mb_substr(strip_tags($value->text), 0, 400).'...' }}</p>
                                                        <p><span>{{ $value->date }}</span></p>
                                                        <p><a href="{{ route('video-article', ['id'=>$value->slug]) }}">Подробнее</a>
                                                        </p>
                                                    </div>
                                                </div>
                                                @endforeach

                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        @endif


        <section id="calendar-section">
            <div class="container">
                <div class="row no-gutter">
                    <div class="col-sm-6 col-lg-4 text-right">
                        <div class="calendar-ev">
                            <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
                        </div>
                        <div id='calendar'></div>
                    </div>
                    <div class="col-sm-6 col-lg-8">
                        <div class="calendar-news">

                            <div class="photo-gallery">
                                @foreach($images as $image)
                                    <div class="photo-gallery-conateiner">
                                        <a href="{{ route('image-article', ['id'=>$image->id]) }}"><div class="gallery-img">
                                            <img src="{{ asset($image->img) }}" alt="Images">
                                        </div></a>
                                        <div class="gallery-text">
                                            <a href="{{ route('image-article', ['id'=>$image->id]) }}">{{ $image->title }}</a>
                                            <span>{{ $image->date }}</span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="but">
                                <a class="image-but" href="{{ route('images') }}">Фотогалерея</a>
                            </div>

                        </div>
                    </div>
                <!-- <div class="but">
                    <a class="image-but" href="{{ route('images') }}">Фотогалерея</a>
                </div> -->
                    <!-- mobail -->
                </div>
            </div>
        </section>
        <!--<section id="org-section">-->
        <!--    <div class="container authors-project">-->
        <!--        <h2>Авторы проекта</h2>-->
        <!--        <p>Региональный проект «Улучшение возможностей для торговли продукцией с высокой добавленной стоимостью в Грузии, Молдове, Таджикистане и Узбекистане» реализуется Продовольственной и сельскохозяйственной организацией объединённых наций (ФАО) совместно с Европейским банком реконструкции и развития (ЕБРР) и отраслевыми ассоциациями при поддержке EU4Business.</p>-->
        <!--    </div>-->
        <!--</section>-->
        <section id="partners-section">
            <div class="container">
                <div class="row no-gutter">
                    <div class="col-sm-6 col-md-5 text-right partners-text">
                        <p>Партнеры проекта:</p>
                    </div>
                    <div class="col-sm-6 col-md-2 col-xs-6 text-right">
                        <img src="images/UHA.png" alt=""/>
                    </div>
                    <div class="col-sm-3 col-md-3 col-xs-6 text-center">
                        <img src="images/400x400.png" alt=""/>
                    </div>
                </div>
            </div>
        </section>
    </section>
@endsection