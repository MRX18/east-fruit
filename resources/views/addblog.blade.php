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

                        <div class="comments-item">
                            <div class="comment-wrapper" id="cdaec8da27">
                                <div id="comment-pjax-container-w0" data-pjax-container="" data-pjax-timeout="20000">
                                    <div class="comments row">
                                        <div class="col-md-12 col-sm-12">

                                            <div id="w1" class="new-comments">
                                                <div class="empty"></div>
                                            </div>
                                            <h2 style="display: block; margin-bottom: 20px;">Добавить статью в
                                                блог: </h2>
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
                                                    <strong>Ваша статья была добавлена!</strong> Он будет опубликован
                                                    после одобрения модератора.
                                                </div>
                                            @endif
                                            <div class="comment-form-container">
                                                <form name="com" id="comment-form" class="comment-box"
                                                      action="{{ route('addartblog') }}" method="post">
                                                    {{ csrf_field() }}

                                                    <div class="form-group">
                                                        <input type="text" class="form-control" name="title"
                                                               placeholder="Название статьи">
                                                    </div>

                                                    <div class="form-group field-commentmodel-content required">
                                                        <textarea style="height: 250px;" id="commentmodel-content"
                                                                  class="form-control" name="article" rows="4"
                                                                  placeholder="Добавить статью..."
                                                                  data-comment="content"
                                                                  aria-required="true"></textarea>
                                                        <div class="help-block"></div>
                                                    </div>

                                                    <div class="p20-item">
                                                        <div class="row">
                                                            <div class="col-md-9">
                                                                <div class="checkbox">
                                                                    <label><input type="checkbox"> Размещая запись в
                                                                        блоге, я соглашаюсь с Правилами сайта</label>
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
                                                </form>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                    <form action="{{ route('addblog') }}" method="post" enctype="multipart/form-data">
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

                            @else
                                <div class="add-article">
                                    <a href="/login">Авторизироваться</a>
                                </div>
                            @endif

                        </div>

                        @include('includes.sitebar', ['$sitebarArticle' => $sitebarArticle])

                        @if(isset($banner))
                            <div class="banner-category">
                                <img src="{{ asset($banner->img) }}" alt="Banner">
                            </div>
                        @endif

                    </div>

                </div>
            </div>
        </section>

    </section>
@endsection