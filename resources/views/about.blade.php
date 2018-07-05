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
            <li class="img-logo"><img src="../../images/page-item/Layer-968.png" alt="Главная"></li>
            <li><a href="/">Главная</a></li>
            <li><img src="../../images/page-item/Polygon-968.png" alt="/"></li>
            <li><a style="font-weight: normal;" href="{{ route('about') }}">О проекте</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <h2 class="title-item">East-fruit.com - аналитическая платформа для роста плодоовощного бизнеса</h2>

   

        <div class="descr-item">
            <p>Повышение доходов производителей за счёт более эффективного производства, хранения, доработки и маркетинга овощей и фруктов – это главная задача информационно-аналитической платформы East-Fruit.com. Данный проект является центром накопления знания и опыта для всех участников плодоовощного рынка Центральной Азии, Кавказа и Восточной Европы.</p>

            <p><b>East-fruit.com – это Ваш личный отдел маркетинга, работающий круглосуточно и без выходных!</b></p>

            <p>Цены на овощи и фрукты в разных странах региона, аналитика, причины ценовых колебаний и прогнозы цен, новости плодоовощного рынка, фундаментальные исследования рынка, розничный аудит, онлайн-консультации ведущих экспертов, успешный опыт участников рынка, а также участие в торговых форумах, профильных семинарах и конференциях для предпринимателей аграрного бизнеса, технологии выращивания, доработки, хранения, упаковки и маркетинга освещаются на нашем портале.</p>

            <p><b>Для кого East-fruit.com</b></p>
            <p>Для производителей плодоовощной продукции, малых и средних фермеров, производителей фруктовых и овощных соков, плодоовощной консервации, фруктовых концентратов и паст, сухофруктов, производителей замороженных ягод и овощей, экспортёров, импортёров, сетей супермаркетов, поставщиков саженцев, семян, МТР, технологий и оборудования, а также для ассоциаций и объединений производителей плодоовощной продукции, государственных структур и поставщиков услуг и товаров для агросектора. Т.е., фактически, для всех участников плодоовощного бизнеса.</p>
            <p>Использование информационно-аналитической платформы East-Fruit.com дает возможность участникам плодоовощного рынка обмениваться знаниями и опытом посредством системы блогов и комментариев, а также расширять деловые контакты посредством участия в профильных мероприятиях, организованных Продовольственной и сельскохозяйственной организацией объединённых наций (ФАО) совместно с Европейским банком реконструкции и развития (ЕБРР).</p>
            <p>Для того, чтобы не упустить ни одного материала нашего сайта, подпишитесь на еженедельные обновления новостей проекта.</p>
            <p>Проект осуществляется при поддержке Продовольственной и сельскохозяйственной организации ООН (ФАО), Европейского банка реконструкции и развития (ЕБРР) и EU4Business, однако публикации на этом сайте не являются официальными материалами данных организаций, если иное не указано в тексте, и не обязательно отражают их позицию.</p>
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
    <h3>Актуальное в блоге</h3>
        @foreach($blogSitebar as $sitebar)
            <div data-key="43">
                <div class="item">
                    <div class="item-image">
                        <span class="item-image-date">{{ $sitebar->date }}</span>
                        <!--<span class="item-image-time">09:30</span>-->
                    </div>
                    <div class="item-content">
                        <p class="ellipsis">                       @if($sitebar->slug == NULL)
										  <a href="{{ route('articleBlog', ['id'=>$sitebar->id]) }}">{{ $sitebar->title }}</a>
                                        @else
                                            <a href="{{ route('articleBlog', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a>
                                        @endif
                        </p>
                        <div class="entry-meta bg-{{ $sitebar->id_catigories }}">
                            @if($sitebar->visible == 1)
                                {{ $sitebar->catigor }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

</div></div>
                
                </div>

            </div>
        </div>
    </section>

</section>
@endsection