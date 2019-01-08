<div class="col-sm-4 col-lg-3 hidden-xs category-left-block">
    <div class="calendar-ev">
        <a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a>
    </div>
    <div id='calendar'></div>

    <div class="vote-block">
        <h4>Опрос</h4>
        <div id="section-vote">
            <div class="question">{{ $question->title }}</div>
            <div class="main">
                <form action="{{ route('question') }}" method="post" name="web">
                    {{ csrf_field() }}
                    <div class="checkbox">
                        @foreach($answer as $value)
                            <label><input type="radio" name="answer" value="{{ $value->id }}"> {{ $value->title }}</label>
                        @endforeach
                    </div>

                    <button type="submit" class="btn btn-primary comment-add"> Голосовать</button>
                </form>
            </div>
        </div>
    </div>

    @if(isset($banner))
        <div class="banner-category">
            <img src="{{ asset($banner->img) }}" alt="Banner">
        </div>
    @endif

    <div class="news-sitebar">
        <div class="news-sitebar-conteiner">
            <h3><a href="{{ route('event', ['id'=>date('Y')]) }}">Календарь событий</a></h3>

            @foreach($eventСurrent as $article)
                <div class="news-sitebat-article">
                    <div class="news-sitebar-img">
                        <a href="{{ route('conference', ['id'=>$article->id]) }}"><img src="{{ asset($article->img) }}" alt="images"></a>
                    </div>
                    <div class="news-sitebar-text">
                        <a href="{{ route('conference', ['id'=>$article->id]) }}">{{ $article->title }}</a>
                        <span>{{ date("d.m.Y", strtotime($article->date)) }}</span>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="news-sitebar-conteiner">
            <h3><a href="{{ route('blog') }}">Блог</a></h3>

            @foreach($blogСurrent as $article)
                <div class="news-sitebat-article">
                    <div class="news-sitebar-img">
                        <a href="{{ route('articleBlog', ['id'=>$article->slug]) }}"><img src="{{ asset($article->img) }}" alt="images"></a>
                    </div>
                    <div class="news-sitebar-text">
                        <a href="{{ route('articleBlog', ['id'=>$article->slug]) }}">{{ $article->title }}</a>
                        <span>{{ date("d.m.Y", strtotime($article->date)) }}</span>
                    </div>
                </div>
            @endforeach

        </div>

        <div class="news-sitebar-conteiner">
            <h3><a href="{{ route('images') }}">Фотогалерея</a></h3>

            @foreach($imageСurrent as $article)
                <div class="news-sitebat-article">
                    <div class="news-sitebar-img">
                        <a href="{{ route('image-article', ['id'=>$article->id]) }}"><img src="{{ asset($article->img) }}" alt="images"></a>
                    </div>
                    <div class="news-sitebar-text">
                        <a href="{{ route('image-article', ['id'=>$article->id]) }}">{{ $article->title }}</a>
                        <span>{{ date("d.m.Y", strtotime($article->date)) }}</span>
                    </div>
                </div>
            @endforeach
        </div>

    </div>

</div>