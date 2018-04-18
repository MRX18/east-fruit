    <!DOCTYPE html>
    <html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

<!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/fontawesome/web-fonts-with-css/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/adaptive.css') }}" rel="stylesheet">
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet">        <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>
        <div class="east-header">
        <div class="content">
            <div class="col-md-12">
                <div class="east-header-logo">
                    <img src="{{ asset('images/east-fruit.png') }}">
                </div>
                <div class="east-header-hamburger">
                    <img src="images/hamburger.png">
                </div>
                <div class="east-header-phone">
                    <p>Информация о рынках овощей и фруктов на восток от Евросоюза</p>
                </div>
                <div class="east-header-buttons">
                    <div class="header-add-place">
                        <ul class="">
                            <li> <a href="index.html#"><i class="fab fa-twitter"></i></a> </li>
                            <li> <a href="index.html#"> <i class="fab fa-instagram"></i></a> </li>
                            <li> <a href="index.html#"><i class="fab fa-facebook-f"></i></i></a></li>
                            <li style="margin-right: 10px;"> <a href="index.html#"><i class="fab fa-telegram-plane"></i></a> </li>
                            <li> <a href="index.html#"><i class="fab fa-viber"></i></a> </li>
                            <li>|</li>
                            <li>
                                <div class="search-container">
                                    <div class="search-icon-btn"> <span style="cursor:pointer"><i class="fas fa-search"></i></span> </div>
                                    <div class="search-input">
                                        <input type="search" class="search-bar" placeholder="Search..." title="Search"/>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="east-menu">
        <div class="content">
            <div class="col-lg-12">
                <!-- <a href="news-categories/view/index.html@id=3.html">Новости</a>
                <a href="news-categories/view/index.html@id=4.html">Исследования</a>
                <a href="news-categories/view/index.html@id=5.html">Технологии</a>
                <a href="news-categories/view/index.html@id=6.html">Розничный аудит</a>
                <a href="index.html#">Цены</a>
                <a class="current-link" href="index.html#">Рейтинги</a>
                <a href="index.html#">Блог</a> -->
                @foreach($catigories as $catigor)
                    <!-- <a href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a> -->
                    @if($catigor->color == 0)
                        <a href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a>
                    @else
                        <a class="current-link" href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a>
                    @endif
                    
                @endforeach

                 @foreach($otherCatigorTop as $catigor)
                    <!-- <a href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a> -->
                    @if($catigor->color == 0)
                        <a href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                    @else
                        <a class="current-link" href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                    @endif
                    
                @endforeach
            </div>
        </div>
    </div>
    <div class="east-menu east-second-menu">
        <div class="content">
            <div class="col-md-12">
                <a class="border-none" href="/">Главная</a>
                <a href="news-categories/view/index.html@id=11.html">Интервью</a>
                <a href="index.html">Календарь событий</a>
                <a href="news-categories/view/index.html@id=13.html">Обучающие поездки</a>
                <a href="news-categories/view/index.html@id=14.html">История бизнеса</a>
            </div>
        </div>
    </div>
        
    @yield('content')
<!--========== END #MAIN-SECTION ==========-->
    <!--========== BEGIN #FOOTER==========-->
    <footer id="footer">
        <div class="container">
            <div class="col-lg-12 border-bottom text-center hidden-xs">
                <div class="menu">
                    <a href="/">Главная</a>
                    <a href="news-categories/view/index.html@id=11.html">Интервью</a>
                    <a href="index.html">Календарь событий</a>
                    <a href="news-categories/view/index.html@id=13.html">Обучающие поездки</a>
                    <a href="news-categories/view/index.html@id=14.html">История бизнеса</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="links">
                    <a href="{{ route('about') }}">О проекте</a>
                    <a href="{{ route('cooperation') }}">Сотрудничество</a>
                    <a href="{{ route('contact') }}">Контакты</a>
                    <!-- <a href="index.html">Медиа</a> -->
                    <a href="{{ route('regulations') }}">Правила использоваия материалов</a>
                </div>
            </div>
            <div class="col-lg-7">
                <ul>
                    <li> <a href="index.html#"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="index.html#"> <i class="fab fa-instagram"></i></a> </li>
                    <li> <a href="index.html#"><i class="fab fa-facebook-f"></i></i></a></li>
                    <li style="margin-right: 10px;"> <a href="index.html#"><i class="fab fa-telegram-plane"></i></a> </li>
                    <li> <a href="index.html#"><i class="fab fa-viber"></i></a> </li>
                </ul>
                <p class="text"><b>EAST- FRUIT.com – место роста плодоовощного бизнеса</b><br>
В фокусе проекта - повышение эффективности производства и качества продукции плодоовощного сектора; экспорт продуктов с высокой добавленной стоимостью; новые возможности для улучшения цепочек добавленной стоимости в поставках плодоовощной продукции. Аналитика, новости плодоовощного бизнеса, исследования, истории бизнеса, мониторинг цен, розничный аудит, обучающие поездки и семинары. Использование материалов сайта свободно при наличии активной ссылки на East-FRUIT.com.
</p>
            </div>
            <div class="col-lg-2 east-footer-copy">
                <div class="">
                    <img src="{{ asset('images/east-fruit.png') }}">
                </div>
                <div class="">
                    <p class="copy">© 2018 Аналитическая платформа для роста плодоовощного бизнеса</p>
                    <p class="copy">Все права защищены</p>
                </div>
            </div>
        </div>
    </footer>

<script src="{{ asset('assets/eba91ba9/jquery.js') }}"></script>
<script src="{{ asset('assets/8a33ea23/yii.js') }}"></script>
<script src="{{ asset('js/jquery-ui.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.js') }}"></script>
<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>    </body>
</html>
