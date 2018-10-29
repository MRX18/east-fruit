<div class="item comment"
     id="comment-1">
    @if(Auth::check() && Auth::user()->email == $comment->email)
        @if(!isset($comment->delete_blog))
            <a href="{{ route('delete-comment', ['id'=>$comment->id]) }}" class="delete-comment" title="Удалить комментарий"><i class="far fa-window-close"></i></a>
        @else
            <a href="{{ route('delete-blog-comment', ['id'=>$comment->id]) }}" class="delete-comment" title="Удалить комментарий"><i class="far fa-window-close"></i></a>
        @endif
    @endif
    <div class="item-image">
        <span class="item-image-user">
        @if($comment->img != null)
            <img src="{{ asset($comment->img) }}" alt="User">
        @else
            <img src="{{ asset('/images/user/user.png') }}"
                 alt="User">
        @endif
        </span>
    </div>
    <div class="item-content">
        <p class="user-name">{{ $comment->user }}<span
                    class="user-date">{{ $comment->date." в ".$comment->time }}</span>
        </p>
        <div class="user-descr">{{ $comment->text }}</div>

    </div>
    {{--<div class="triang-img"></div>--}}
    @if(Auth::check() && Auth::user()->email != $comment->email)
        <a class="reply" href="#comment" data-name="{{ $comment->user }}" data-id="{{ $comment->id }}">Ответить</a>
    @endif
</div>