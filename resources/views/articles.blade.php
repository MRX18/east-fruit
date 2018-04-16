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
            <li><a href="../../index.html">Главная</a></li>
            <li><img src="../../images/page-item/Polygon&#32;968.png" alt="/"></li>
            <li><a href="index.html@id=27.html">Новости</a></li>
            <li><img src="../../images/page-item/Polygon&#32;968.png" alt="/"></li>
            <li><a href="index.html@id=27.html">Розничный аудит</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <h2 class="title-item">{{ $article->title }}</h2>
        <span class="date-item">{{ $article->date }}</span>

        <div class="img-item"><img src="{{ asset($article->img) }}" alt=""></div>

        <div class="descr-item">
            {!! $article->text !!}       
        </div>

        <ul class="category-item">
            <li class="entry-meta bg-7">{{ $article->catigor }}</li>
        </ul>

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
                <span class="item-image-user"><img src="http://www.gravatar.com/avatar?d=mm&amp;f=y&amp;s=50" alt="User"></span>
            </div>
            <div class="item-content">
                <p class="user-name">{{ $comment->user }}<span class="user-date">{{ $comment->date." в ".$comment->time }}</span></p>
                <div class="user-descr">{{ $comment->text }}</div>

            </div>
            <div class="triang-img"></div>
        </div>
        @endforeach

    </div>




            <div id="w1" class="new-comments"><div class="empty"></div></div>                        <div class="comment-form-container">
    <form id="comment-form" class="comment-box" action="{{ route('article', ['id'=>$article->id]) }}" method="post">

<div class="form-group field-commentmodel-content required">
<textarea id="commentmodel-content" class="form-control" name="CommentModel[content]" rows="4" placeholder="Добавить комментарий..." data-comment="content" aria-required="true"></textarea>
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
    </form>    <div class="clearfix"></div>
</div>                    </div>
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
        </div>
        <div class="item-content">
            <p class="ellipsis"><a href="{{ route('article', ['id'=>$read->id]) }}">{{ $read->title }}</a></p>
            <div class="entry-meta-descr"><p style="text-align: justify;">{!! mb_substr($read->text, 0, 300) !!}</div>
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
                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->id]) }}">{{ mb_substr($sitebar->title, 0, 60)."..." }}</a></p>
                <div class="entry-meta bg-{{ rand(1,9) }}">{{ $sitebar->catigor }}</div>
            </div>
        </div>
    </div>
    @endforeach

</div></div>

                    <div id='calendar'></div>
                </div>

            </div>
        </div>
    </section>

</section>
@endsection