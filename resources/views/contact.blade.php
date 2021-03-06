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
                                <li><a style="font-weight: normal;" href="{{ route('cooperation') }}">Контакты</a></li>
                            </ul>
                        </div>

                        <div class="news-more-item">

                            <h2 class="title-item">{{ $content->title }}</h2>

                            <div class="descr-item">
                                {!! $content->text !!}
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

                            @if($addApplications)
                                <div class="alert alert-success">
                                    <strong>Ваша заявка была отправлена. Спасибо!</strong>
                                </div>
                            @endif
                            <form name="com" id="comment-form" class="comment-box" action="{{ route('contact') }}"
                                  method="post">
                                {{ csrf_field() }}
                                @if(!Auth::check())
                                    <div class="forma-contact"
                                         style="display: flex; justify-content: space-between; margin-bottom: 10px;">
                                        <div class="auth-contact" style="width: 49%;">
                                            <input style="width: 100%;" class="form-control" type="text" name="name"
                                                   placeholder="Имя" value="{{ old('name') }}">
                                        </div>
                                        <div class="auth-contact" style="width: 49%;">
                                            <input style="width: 100%;" class="form-control" type="email" name="email"
                                                   placeholder="Email" value="{{ old('email') }}">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-group field-commentmodel-content required">
                                    <textarea id="commentmodel-content" class="form-control" name="text" rows="4"
                                              placeholder="Текст..." data-comment="content"
                                              aria-required="true">{{ old('text') }}</textarea>
                                    <div class="help-block"></div>
                                </div>

                                <div class="p20-item">
                                    <div class="row">
                                        <div>
                                            <button style="margin-right: 15px;" type="submit"
                                                    class="btn btn-primary comment-add comment-submit">Отправить
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <form style="padding:3px;text-align:center;" action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=EastFruit', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p>Введите свой электронный адрес для подписки на RSS-рассылку:</p><p><input type="text" style="width:300px" name="email"/></p><input type="hidden" value="EastFruit" name="uri"/><input type="hidden" name="loc" value="ru_RU"/><input type="submit" value="Подписатся" /></form>

                        </div>

                    </div>


                    <div class="col-sm-4 col-lg-3 hidden-xs">

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                    </div>

                </div>
            </div>
        </section>

    </section>
@endsection