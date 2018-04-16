    <!DOCTYPE html>
    <html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ $title }}</title>
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
<link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
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
                            <li> <a href="index.html#"><i class="fa fa-twitter"></i></a> </li>
                            <li> <a href="index.html#"> <i class="fa fa-instagram"></i></a> </li>
                            <li> <a href="index.html#"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="index.html#">
                                    <svg aria-hidden="true" data-prefix="fab" data-icon="telegram-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-telegram-plane fa-w-14 fa-2x"><path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z" class=""></path></svg>
                                </a> </li>
                            <li class="border-right"> <a href="index.html#">
                                    <svg aria-hidden="true" data-prefix="fab" data-icon="viber" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-viber fa-w-16" style="font-size: 16px;"><path fill="currentColor" d="M444 49.9C431.3 38.2 379.9.9 265.3.4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9.4-85.7.4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9.4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9.6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4.7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5.9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9.1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7.5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1.8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z" class=""></path></svg></a>
                                </a> </li>
                            <li>|</li>
                            <li>
                                <div class="search-container">
                                    <div class="search-icon-btn"> <span style="cursor:pointer"><i class="fa fa-search"></i></span> </div>
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
                <a class="border-none" href="index.html">Главная</a>
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
                    <a href="index.html">Главная</a>
                    <a href="news-categories/view/index.html@id=11.html">Интервью</a>
                    <a href="index.html">Календарь событий</a>
                    <a href="news-categories/view/index.html@id=13.html">Обучающие поездки</a>
                    <a href="news-categories/view/index.html@id=14.html">История бизнеса</a>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="links">
                    <a href="index.html">Организаторы</a>
                    <a href="index.html">Сотрудничество</a>
                    <a href="index.html">Контакты</a>
                    <a href="index.html">Медиа</a>
                    <a href="index.html">Правила использоваия материалов</a>
                </div>
            </div>
            <div class="col-lg-7">
                <ul>
                    <li> <a href="index.html#"><i class="fa fa-twitter"></i></a> </li>
                    <li> <a href="index.html#"> <i class="fa fa-instagram"></i></a> </li>
                    <li> <a href="index.html#"><i class="fa fa-facebook"></i></a></li>
                    <li> <a href="index.html#">
                            <svg aria-hidden="true" data-prefix="fab" data-icon="telegram-plane" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="svg-inline--fa fa-telegram-plane fa-w-14 fa-2x"><path fill="currentColor" d="M446.7 98.6l-67.6 318.8c-5.1 22.5-18.4 28.1-37.3 17.5l-103-75.9-49.7 47.8c-5.5 5.5-10.1 10.1-20.7 10.1l7.4-104.9 190.9-172.5c8.3-7.4-1.8-11.5-12.9-4.1L117.8 284 16.2 252.2c-22.1-6.9-22.5-22.1 4.6-32.7L418.2 66.4c18.4-6.9 34.5 4.1 28.5 32.2z" class=""></path></svg>
                        </a> </li>
                    <li > <a href="index.html#">
                            <svg aria-hidden="true" data-prefix="fab" data-icon="viber" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" class="svg-inline--fa fa-viber fa-w-16" style="font-size: 16px;"><path fill="currentColor" d="M444 49.9C431.3 38.2 379.9.9 265.3.4c0 0-135.1-8.1-200.9 52.3C27.8 89.3 14.9 143 13.5 209.5c-1.4 66.5-3.1 191.1 117 224.9h.1l-.1 51.6s-.8 20.9 13 25.1c16.6 5.2 26.4-10.7 42.3-27.8 8.7-9.4 20.7-23.2 29.8-33.7 82.2 6.9 145.3-8.9 152.5-11.2 16.6-5.4 110.5-17.4 125.7-142 15.8-128.6-7.6-209.8-49.8-246.5zM457.9 287c-12.9 104-89 110.6-103 115.1-6 1.9-61.5 15.7-131.2 11.2 0 0-52 62.7-68.2 79-5.3 5.3-11.1 4.8-11-5.7 0-6.9.4-85.7.4-85.7-.1 0-.1 0 0 0-101.8-28.2-95.8-134.3-94.7-189.8 1.1-55.5 11.6-101 42.6-131.6 55.7-50.5 170.4-43 170.4-43 96.9.4 143.3 29.6 154.1 39.4 35.7 30.6 53.9 103.8 40.6 211.1zm-139-80.8c.4 8.6-12.5 9.2-12.9.6-1.1-22-11.4-32.7-32.6-33.9-8.6-.5-7.8-13.4.7-12.9 27.9 1.5 43.4 17.5 44.8 46.2zm20.3 11.3c1-42.4-25.5-75.6-75.8-79.3-8.5-.6-7.6-13.5.9-12.9 58 4.2 88.9 44.1 87.8 92.5-.1 8.6-13.1 8.2-12.9-.3zm47 13.4c.1 8.6-12.9 8.7-12.9.1-.6-81.5-54.9-125.9-120.8-126.4-8.5-.1-8.5-12.9 0-12.9 73.7.5 133 51.4 133.7 139.2zM374.9 329v.2c-10.8 19-31 40-51.8 33.3l-.2-.3c-21.1-5.9-70.8-31.5-102.2-56.5-16.2-12.8-31-27.9-42.4-42.4-10.3-12.9-20.7-28.2-30.8-46.6-21.3-38.5-26-55.7-26-55.7-6.7-20.8 14.2-41 33.3-51.8h.2c9.2-4.8 18-3.2 23.9 3.9 0 0 12.4 14.8 17.7 22.1 5 6.8 11.7 17.7 15.2 23.8 6.1 10.9 2.3 22-3.7 26.6l-12 9.6c-6.1 4.9-5.3 14-5.3 14s17.8 67.3 84.3 84.3c0 0 9.1.8 14-5.3l9.6-12c4.6-6 15.7-9.8 26.6-3.7 14.7 8.3 33.4 21.2 45.8 32.9 7 5.7 8.6 14.4 3.8 23.6z" class=""></path></svg></a>
                        </a> </li>
                </ul>
                <p class="text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                    ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris
                    nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
                    dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui
                    officia deserunt mollit anim id est laborum.</p>
            </div>
            <div class="col-lg-2 east-footer-copy">
                <div class="">
                    <img src="{{ asset('images/east-fruit.png') }}">
                </div>
                <div class="">
                    <p class="copy">© 2018 Новостное агентство East Fruit</p>
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
