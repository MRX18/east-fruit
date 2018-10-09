@extends('layouts.main')
@section('content')
    <section id="main-section">

        <section id="news-section">
            <div class="container">
                <div class="row no-gutter">

                    <link rel="stylesheet" href="../../css/style-items.css"/>
                    <div class="col-sm-8 col-lg-9">
                        <div class="news-bredcrumbs-item">
                            <ul>
                                <li class="img-logo"><img src="../../images/page-item/Layer-968.png" alt="Главная">
                                </li>
                                <li><a href="/">Главная</a></li>
                                <li><img src="../../images/page-item/Polygon-968.png" alt="/"></li>
                                <li><a style="font-weight: normal;" href="{{ route('blog') }}">Блог</a></li>
                            </ul>
                        </div>

                        <div class="news-more-item">

                            <div class="user-article">
                                <div class="img"><img src="{{ asset($author->img) }}" alt=""></div>
                                <div class="text">
                                    <h3>{{ $author->name }}</h3>
                                    <p>{{ $author->position }}</p>
                                </div>
                            </div>

                            <h2 class="title-item">{{ $article->title }}</h2>

                            <span class="date-user">{{ $article->date }}</span>

                            <div class="descr-item">
                                {!! $article->text !!}
                            </div>
                            <p>Основные новости и аналитика плодоовощного рынка на <a href="https://www.facebook.com/eastfruit/">Facebook</a> и в <a href="https://t.me/eastfruit">Telegram</a> East-Fruit.com 
<br>Подписывайтесь!</p>
<p style="font-size: 14px">Использование материалов сайта свободно при наличии прямой, открытой для поисковых систем, ссылки на конкретную публикацию аналитической платформы <a href="https://east-fruit.com">East-fruit.com</a>.</p>
                            <div class="share42init" data-url="{{ route('articleBlog', ['id' => $article->slug]) }}"
                                 data-title="{{ $article->title }}" data-image="{{ asset($author->img) }}"
                                 data-description="{{ $author->name }}"></div>
                        </div>

                        <div class="comments-item">
                            <div class="comment-wrapper" id="cdaec8da27">
                                <div id="comment-pjax-container-w0" data-pjax-container="" data-pjax-timeout="20000">
                                    <div class="comments row">
                                        <div class="col-md-12 col-sm-12">
                                            <div class="title-block clearfix">
                                                <h3 class="comment-title">
                                                    Комментарии ({{ count($comment) }}) </h3>
                                            </div>


                                            <div id="w1" class="new-comments">
                                                @foreach($comment as $com)
                                                    <div style="background-color: #F3F3F3;" class="item comment"
                                                         id="comment-1">
                                                        <div class="item-image">
                <span class="item-image-user">
                    @if($com->img != null)
                        <img src="{{ asset($user->img) }}" alt="User">
                    @else
                        <img src="{{ asset('/images/user/user.png') }}" alt="User">
                    @endif
                </span>
                                                        </div>
                                                        <div class="item-content">
                                                            <p class="user-name">{{ $com->user }}<span
                                                                        class="user-date">{{ $com->date.' o '.$com->time }}</span>
                                                            </p>
                                                            <div class="user-descr">{{ $com->text }}</div>

                                                        </div>
                                                        <div class="triang-img"></div>
                                                    </div>
                                                @endforeach

                                            </div>


                                            <div id="w1" class="new-comments">
                                                <div class="empty"></div>
                                            </div>
                                            @if (count($errors) > 0)
                                                <div class="alert alert-danger">
                                                    <ul>
                                                        @foreach ($errors->all() as $error)
                                                            <li>{{ $error }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if(Session::has('addComment'))
                                                <div class="alert alert-success">
                                                    <strong>Ваш комментарий был отправлен!</strong>
                                                </div>
                                            @endif
                                            <div class="comment-form-container">
                                                <form name="com" id="comment-form" class="comment-box"
                                                      action="{{ route('addcomment', ['id'=>$article->id]) }}"
                                                      method="post">
                                                    {{ csrf_field() }}

                                                    @if(Auth::check())
                                                        <div class="form-group field-commentmodel-content required">
                                                        <textarea id="commentmodel-content" class="form-control"
                                                                  name="comment" rows="4"
                                                                  placeholder="Добавить комментарий..."
                                                                  data-comment="content"
                                                                  aria-required="true"></textarea>
                                                            <div class="help-block"></div>
                                                        </div>

                                                        <div class="p20-item">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <div class="checkbox">
                                                                        <label><input type="checkbox"> Размещая
                                                                            комментарий,
                                                                            я соглашаюсь с Правилами сайта</label>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <button type="submit"
                                                                            class="btn btn-primary comment-add comment-submit"
                                                                            disabled="disabled"><img
                                                                                src="../../images/page-item/comments/add-comment.png"
                                                                                alt="add-comment"> Добавить
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    @else
                                                        <h4 style="font-size: 16px;">Для того чтобы оставить комментарий
                                                            вы должны <a href="/login">авторизоваться</a> или <a
                                                                    href="/register">зарегистрироваться</a>!</h4>
                                                    @endif
                                                </form>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                        </div>

                        <div class="more-news-item">

                            <h4>Читайте также</h4>
                            <div id="w2" class="list-view">
                                @foreach($reads as $read)
                                    <div data-key="28">
                                        <div class="item-news">
                                            <div class="item-image">
                                                <span class="item-image-date">{{ $read->date }}</span>
                                                <div class="img" style="width: 100px; margin: 10px 10px 0px 0px;">
                                                    <img style="width: 100%;" src="{{ asset($read->img) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="item-content">
                                                <p class="ellipsis"><a
                                                            href="{{ route('article', ['id'=>$read->slug]) }}">{{ $read->title }}</a>
                                                </p>
                                                <div class="entry-meta-descr"><p
                                                            style="text-align: justify;">{{ mb_substr(strip_tags($read->text), 0, 350).'...' }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach


                            </div>
                        </div>

                    </div>


                    <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">

                        <div class="user">
                            @if($auth)
                                <div class="img">
                                    @if($user->img != null)
                                        <img src="{{ asset($user->img) }}" alt="">
                                    @else
                                        <img src="{{ asset('/images/user/user-blog.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="name-user">
                                    <h3>{{ $user->name }}</h3>
                                    <p>{{ $user->position }}</p>
                                </div>


                                <div class="form-conteiner">
                                    <form action="{{ route('articleBlog', ['id'=>$article->id]) }}" method="post"
                                          enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="form">
                                            <div class="file-upload">
                                                <label>
                                                    <input id="userPhoto" type="file" name="img">
                                                    <span>Выберите фото</span>
                                                </label>
                                            </div>


                                            <div class="form-group" style="margin-top: 7px;">
                                                <label for="name">Имя:</label>
                                                <input type="text" name="name" class="form-control" id="name"
                                                       value="{{ $user->name }}">
                                            </div>


                                            <div class="form-group">
                                                <label style="font-size: 14px;" for="exampleInputName2">Род
                                                    деятельности</label>
                                                <div>
                                                    <select id="position-select" class="form-control"
                                                            name="positionSelect">
                                                        @if($user->id_occupation == 0)
                                                            <option disabled selected>Выберите род деятельности</option>
                                                        @endif

                                                        @foreach($occupations as $occupation)
                                                            @if($occupation->id == $user->id_occupation)
                                                                <option selected
                                                                        value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                                            @else
                                                                <option value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                                            @endif
                                                        @endforeach
                                                        <option id="otherR" value="9999">Другое ( укажите род
                                                            деятельности)
                                                        </option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                                <label for="position">Должность</label>

                                                <div>
                                                    <input id="position" type="position" class="form-control"
                                                           name="position" value="{{ $user->position }}" disabled>

                                                    @if ($errors->has('position'))
                                                        <span class="help-block">
                                                    <strong>{{ $errors->first('position') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            </div>


                                            <div class="button" style="margin-top: -15px; margin-bottom: 15px;">
                                                <button id="userBlog" type="submit">Обновить информацию</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <!--<div class="add-article">-->
                                <!--    <a href="{{ route('addblog') }}">Добавить статью</a>-->
                                <!--</div>-->
                            @else
                                <div class="add-article">
                                    <a href="/login">Авторизироваться</a>
                                </div>
                            @endif

                        </div>

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])


                    </div>

                </div>
            </div>
        </section>

    </section>
@endsection