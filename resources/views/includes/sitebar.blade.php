<div class="entry-post">
    <h3><a href="{{ route('all-articles') }}">Актуальное</a></h3>
    <!-- Begin .item-->
    <div id="w4" class="list-view">

        @foreach($articleSitebar as $sitebar)
            <div data-key="43">
                <div class="item">
                    <div class="item-image">
                        <span class="item-image-date">{{ $sitebar->date }}</span>
                        <!--<span class="item-image-time">09:30</span>-->
                    </div>
                    <div class="item-content">
                        <p class="ellipsis"><a
                                    href="{{ $sitebar->slug }}">{{ $sitebar->title}}</a>
                        </p>
                        <div class="entry-meta bg-{{ rand(1,9) }}">
                            @if(isset($sitebar->catigor_visible))
                                @if($sitebar->catigor_visible == 1)
                                    {{ $sitebar->catigor }}
                                @endif
                            @else
                                @if($sitebar->visible == 1)
                                    {{ $sitebar->catigor }}
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--<h3>Актуальное в блоге</h3>--}}
        {{--@foreach($blogSitebar as $sitebar)--}}
        {{--<div data-key="43">--}}
        {{--<div class="item">--}}
        {{--<div class="item-image">--}}
        {{--<span class="item-image-date">{{ $sitebar->date }}</span>--}}
        {{--<!--<span class="item-image-time">09:30</span>-->--}}
        {{--</div>--}}
        {{--<div class="item-content">--}}
        {{--<p class="ellipsis">                       @if($sitebar->slug == NULL)--}}
        {{--<a href="{{ route('articleBlog', ['id'=>$sitebar->id]) }}">{{ $sitebar->title }}</a>--}}
        {{--@else--}}
        {{--<a href="{{ route('articleBlog', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a>--}}
        {{--@endif--}}
        {{--</p>--}}
        {{--<div class="entry-meta bg-{{ $sitebar->id_catigories }}">--}}
        {{--@if($sitebar->visible == 1)--}}
        {{--{{ $sitebar->catigor }}--}}
        {{--@endif--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--</div>--}}
        {{--@endforeach--}}
        <div class="add-article" style="margin-bottom: 30px;">
            <a href="{{ route('all-articles') }}">Больше новостей</a>
        </div>

    </div>
</div>