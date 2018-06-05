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
            <li class="img-logo"><img src="../../images/page-item/Layer&#32;968.png" alt="Главная"></li>
            <li><a href="/">Главная</a></li>
            <li><img src="../../images/page-item/Polygon&#32;968.png" alt="/"></li>
            <li><a style="font-weight: normal;" href="{{ route('catigor', ['id'=>$article->id_catigories]) }}">{{ $article->catigor }}</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <h2 class="title-item">{{ $article->title }}</h2>
        
        @if(isset($article->pdf))
            <a class="article-download" href="{{ asset($article->pdf) }}" download>Скачать полную версию </a>
        @endif

        <span class="date-item">{{ $article->date }}</span>

        <div class="img-item img-lid">
            <img src="{{ asset($article->img) }}" alt="{{ $article->title }}">
            @if(!empty($article->lid)) 
                <div class="lid">
                    <p>{{ $article->lid }}</p>
                </div>
            @endif
        </div>

        <div class="descr-item">
            {!! $article->text !!}       
        </div>

        <div class="share42init" data-url="{{ route('article', ['id' => $article->slug]) }}" data-title="{{ $article->title }}" data-image="{{ asset($article->img) }}" data-description="{{ $article->lid }}"></div>


        <ul class="category-item">
            <li class="entry-meta bg-7">{{ $article->catigor }}</li>
        </ul>

        @if(isset($article->pdf))
            <embed width="100%" height="350px" name="plugin" id="plugin" src="{{ asset($article->pdf) }}" type="application/pdf" internalinstanceid="4">
        @endif
    </div>

    <div class="comments-item">
        <div class="comment-wrapper" id="cdaec8da27">
    <div id="comment-pjax-container-w0" data-pjax-container="" data-pjax-timeout="20000">    <div class="comments row">
        <div class="col-md-12 col-sm-12">
            <div class="title-block clearfix">
                <h3 class="comment-title">
                    Комментарии ({{ count($comments) }})                </h3>
            </div>



        
    <div id="w1" class="new-comments">
        @foreach($comments as $comment)
        <div style="background-color: #F3F3F3;" class="item comment" id="comment-1">
            <div class="item-image">
                <span class="item-image-user">
                    @if($comment->img != null)
                    <img src="{{ asset($comment->img) }}" alt="User">
                    @else
                    <img src="{{ asset('/images/user/user.png') }}" alt="User">
                    @endif
                </span>
            </div>
            <div class="item-content">
                <p class="user-name">{{ $comment->user }}<span class="user-date">{{ $comment->date." в ".$comment->time }}</span></p>
                <div class="user-descr">{{ $comment->text }}</div>

            </div>
            <div class="triang-img"></div>
        </div>
        @endforeach

    </div>




            <div id="w1" class="new-comments"><div class="empty"></div></div> 
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
                    <strong>Ваш комментарий был отправлен!</strong> Он будет опубликован после одобрения модератора.
                </div>
            @endif               
            <div class="comment-form-container">
    <form name="com" id="comment-form" class="comment-box" action="{{ route('article', ['id'=>$article->slug]) }}" method="post">
        {{ csrf_field() }}
        @if(!Auth::check())
        <div class="forma" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div class="auth-forma" style="width: 49%;">
                <input style="width: 100%;" class="form-control" type="text" name="name" placeholder="Имя">
            </div>
            <div class="auth-forma" style="width: 49%;">
                <input style="width: 100%;" class="form-control" type="email" name="email" placeholder="Email">
            </div>
        </div>
        @endif

        <div class="form-group field-commentmodel-content required">
            <textarea id="commentmodel-content" class="form-control" name="comment" rows="4" placeholder="Добавить комментарий..." data-comment="content" aria-required="true"></textarea>
        <div class="help-block"></div>
        </div> 

            <div class="p20-item">
                <div class="row">
                    <div class="col-md-9">
                        <div class="checkbox">
                            <label><input type="checkbox"> Размещая комментарий, я соглашаюсь с Правилами сайта</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary comment-add comment-submit" disabled="disabled"><img
                                src="../../images/page-item/comments/add-comment.png" alt="add-comment">  Добавить</button>
                    </div>
                </div>
            </div>
    </form>    
    <div class="clearfix"></div>
</div>                    
</div>
    </div>
    </div></div>
        <!--<h5 class="checkable-comment">Показывать новый комментарий:
            <ul>
                <li><a href="#">внизу</a></li>
                <li>/</li>
                <li><a href="#" class="checkable-active">вверху</a></li>
            </ul>
        </h5>-->



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
            <p class="ellipsis"><a href="{{ route('article', ['id'=>$read->slug]) }}">{{ $read->title }}</a></p>
            <div class="entry-meta-descr"><p style="text-align: justify;">{{ mb_substr(strip_tags($read->text), 0, 300) }}</div>
        </div>
    </div>
</div>
@endforeach

</div>
        </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs">
                    
<div class="entry-post">
    <h3>Актуальное</h3>
    <!-- Begin .item-->
    <div id="w4" class="list-view">

    @foreach($sitebarArticle as $sitebar)
    <div data-key="43">
        <div class="item">
            <div class="item-image">
                <span class="item-image-date">{{ $sitebar->date }}</span>
                <!--<span class="item-image-time">09:30</span>-->
            </div>
            <div class="item-content">
                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title}}</a></p>
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

</div></div>
                    <div class="calendar-ev">
                        <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
                    </div>
                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </section>

</section>
@endsection