    <!DOCTYPE html>
    <html lang="ru-RU">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="_token" content="{!! csrf_token() !!}">
        @if(isset($keywords))
        <meta name="keywords" content="{{ $keywords }}" />
        @endif
        @if(isset($description))
        <meta name="description" content="{{ $description }}" />
        @endif 
        @if(isset($article->img))
        <meta property="og:image" content="{{ asset($article->img) }}" />
        @endif
        <title>{{ $title.' - Eastfruit, Аналитика, Новости плодоовощного рынка,Информация АПК, Цены на овощи и фрукты, Исследования, Конференции' }}</title>
        <link rel="shortcut icon" href="{{ asset('/images/logo.png') }}" type="image/png">
        <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">

<!-- <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet"> -->
<link href="{{ asset('css/fontawesome/web-fonts-with-css/css/fontawesome.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/fontawesome/web-fonts-with-css/css/fontawesome-all.min.css') }}" rel="stylesheet">

<link href="{{ asset('css/style.css') }}" rel="stylesheet">
<link href="{{ asset('css/adaptive.css') }}" rel="stylesheet">
<link href="{{ asset('css/magnific-popup.css') }}" rel="stylesheet">
<link href="{{ asset('slick/slick-theme.css') }}" rel="stylesheet">
<link href="{{ asset('slick/slick.css') }}" rel="stylesheet">          
<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    </head>
    <body>
<div class="top-header">
    @if(Auth::check() && Auth::user()->can('admin-show'))
    <div class="admin-header">
        <div class="content">
            <div class="col-md-12">
                <ul>
                    <li><a href="{{ asset('/admin') }}"><i class="fas fa-home"></i> Admin Panel</a></li>
                    @if(Auth::user()->can('article-create'))
                    <li><a href="{{ asset('/admin/articles/create') }}"><i class="fas fa-plus"></i> Добавить статью</a></li>
                    @endif
                    @if(Auth::user()->can('article-edit') && isset($artID))
                    <li><a href="{{ asset('/admin/articles/'.$artID.'/edit') }}"><i class="fas fa-pencil-alt"></i> Редактировать статью</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    @endif
    <div class="east-header">
        <div class="content">
            <div class="col-md-12">
                <div class="east-header-logo">
                    <a href="/"><img src="{{ asset('images/east-fruit.png') }}"></a>
                </div>
                <div class="east-header-hamburger">
                    <img src="images/hamburger.png">
                </div>
                <div class="east-header-phone">
                    <p>Информация о рынках овощей и фруктов на восток от Евросоюза</p>
                </div>
                <div class="east-header-buttons">
                    <div class="header-add-place">
                        <ul class="menu-auth">
                            @if(!Auth::check())
                            
                                <li style="margin-right: 10px;"> <a style="color: #848AA2; font-size: 14px;" href="/login">Вход</a> </li>
                                <li style="margin-right: 60px;"> <a style="color: #848AA2; font-size: 14px;" href="/register">Регистрация</a> </li>
                            @else
                                <li style="margin-right: 20px;"> <a style="color: #848AA2; font-size: 14px;" href="/logout" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">Выход</a> </li>
                            <form id="logout-form" action="/logout" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                            @endif

                            <li> <a href="/"><i class="fab fa-twitter"></i></a> </li>
                            <li> <a href="/"> <i class="fab fa-instagram"></i></a> </li>
                            <li> <a href="https://www.facebook.com/eastfruit/"><i class="fab fa-facebook-f"></i></i></a></li>
                            <li style="margin-right: 10px;"> <a href="/"><i class="fab fa-telegram-plane"></i></a> </li>
                            <li> <a href="/"><i class="fab fa-viber"></i></a> </li>
                            <li>|</li>
                            <li>
                                <div class="search-container">
                                    <div class="search-icon-btn"> <span style="cursor:pointer"><i class="fas fa-search"></i></span> </div>
                                    <div class="search-input">
                                        <form action="{{ route('search') }}" method="get">
                                            <div class="search-form">
                                                <input type="search" name="s" placeholder="Search..." title="Search"/>
                                                <button><i class="fas fa-search"></i></button>
                                                <a class="close-search"><i class="fas fa-times"></i></a>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </li>
                        </ul>

                        <ul class="menu-auth-bottom">
                            <li> <a href="/"><i class="fab fa-twitter"></i></a> </li>
                            <li> <a href="/"> <i class="fab fa-instagram"></i></a> </li>
                            <li> <a href="/"><i class="fab fa-facebook-f"></i></i></a></li>
                            <li> <a href="/"><i class="fab fa-telegram-plane"></i></a> </li>
                            <li> <a href="/"><i class="fab fa-viber"></i></a> </li>
                            <li>|</li>
                            <li style="margin-left: -20px;">
                                <div class="search-container">
                                    <div class="search-icon-btn"> <span style="cursor:pointer"><i class="fas fa-search"></i></span> </div>
                                    <div class="search-input">
                                        <form action="{{ route('search') }}" method="get">
                                            <div class="search-form">
                                                <input type="search" name="s" placeholder="Search..." title="Search"/>
                                                <button><i class="fas fa-search"></i></button>
                                                <a class="close-search"><i class="fas fa-times"></i></a>
                                            </div>
                                        </form>
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
                @foreach($catigories as $catigor)
                    @if($catigor->menu == 1)
                        @if($catigor->color == 0)
                            <a href="{{ route('catigor', ['id'=>$catigor->slug]) }}">{{ $catigor->title }}</a>
                        @else
                            <a class="current-link" href="{{ route('catigor', ['id'=>$catigor->slug]) }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach

                 @foreach($otherCatigorTop as $catigor)

                     @if($catigor->menu == 1)
                        @if($catigor->color == 0)
                            <a href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                        @else
                            <a class="current-link" href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach
            </div>
        </div>
    </div>
    <div class="east-menu east-second-menu">
        <div class="content">
            <div class="col-md-12 bottom-menu">
                 <a href="/">Главная</a>
                @foreach($catigories as $catigor)
                    @if($catigor->menu == 2)
                        @if($catigor->color == 0)
                            <a href="{{ route('catigor', ['id'=>$catigor->slug]) }}">{{ $catigor->title }}</a>
                        @else
                            <a class="current-link" href="{{ route('catigor', ['id'=>$catigor->slug]) }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach

                @foreach($otherCatigorTop as $catigor)

                     @if($catigor->menu == 2)
                        @if($catigor->slug == 'events')
                            <a href="{{ '/'.$catigor->slug.'/'.date('Y') }}">{{ $catigor->title }}</a>
                        @else
                            <a href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach
            </div>
        </div>
    </div>
</div>
<div class="height"></div>
        
    @yield('content')
<!--========== END #MAIN-SECTION ==========-->
    <!--========== BEGIN #FOOTER==========-->
    <footer id="footer">
        <div class="container">
            <div class="col-lg-12 border-bottom text-center hidden-xs">
                <div class="menu">
                    <a href="/">Главная</a>
                @foreach($catigories as $catigor)
                    @if($catigor->menu == 2)
                        @if($catigor->color == 0)
                            <a href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a>
                        @else
                            <a class="current-link" href="{{ route('catigor', ['id'=>$catigor->id]) }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach

                @foreach($otherCatigorTop as $catigor)

                     @if($catigor->menu == 2)
                        @if($catigor->slug == 'events')
                            <a href="{{ '/'.$catigor->slug.'/'.date('Y') }}">{{ $catigor->title }}</a>
                        @else
                            <a href="{{ '/'.$catigor->slug }}">{{ $catigor->title }}</a>
                        @endif
                    @endif
                    
                @endforeach
                </div>
            </div>
            <div class="col-lg-3">
                <div class="links" style="position: relative; z-index: 100;">
                    <a href="{{ route('about') }}">О проекте</a>
                    <a href="{{ route('cooperation') }}">Сотрудничество</a>
                    <a href="{{ route('contact') }}">Контакты</a>
                    <!-- <a href="index.html">Медиа</a> -->
                    <a href="{{ route('regulations') }}">Правила использования материалов</a>
                </div>
            </div>
            <div class="col-lg-7">
                <ul>
                    <li> <a href="/"><i class="fab fa-twitter"></i></a> </li>
                    <li> <a href="/"> <i class="fab fa-instagram"></i></a> </li>
                    <li> <a href="/"><i class="fab fa-facebook-f"></i></i></a></li>
                    <li style="margin-right: 10px;"> <a href="/"><i class="fab fa-telegram-plane"></i></a> </li>
                    <li> <a href="/"><i class="fab fa-viber"></i></a> </li>
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
<script src="{{ asset('js/jquery.magnific-popup.js') }}"></script>
<script src="{{ asset('slick/slick.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script type="text/javascript" src="{{ asset('/share42/share42.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#userPhoto').on('change', function() {
            $('#userBlog').click();
        });

        $('select[id=position-select]').on('change', function() {
            if($(this).val() == '9999') {
                $('#position').removeAttr('disabled');
            } else {
                $('#position').attr("disabled","disabled");  
            }
            // alert($(this).val());
            // $('#position').removeAttr('disabled');
        });
    });
</script>
</body>
</html>
