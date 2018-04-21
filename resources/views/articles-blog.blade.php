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
            <li><a style="font-weight: normal;" href="asdasd">news</a></li>
        </ul>
    </div>

    <div class="news-more-item">

        <div class="user-article">
           <div class="img"> <img src="{{ asset('/images/657220.jpg') }}" alt=""></div>
           <div class="text">
               <h3>Гліб Канєвський</h3>
               <p>Голова експертної організації StateWatch, Антикорупційна група РПР</p>
           </div>
        </div>

        <h2 class="title-item">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість</h2>

        <span class="date-user">03.03.2018</span>

        <div class="descr-item">
            <p>Гучний конфлікт між головою парламентського комітету з питань оборони <b>Сергієм Пашинським</b> та журналом <b>"Новое Время"</b> суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету.<br><br>Та це не так.<br><br>Експертне середовище, яке системно слідкує за діяльністю понад сотні підприємств державного концерну "Укроборонпром", розуміє, що проблеми неефективності та корупції системні, всепоглинаючі і прямо ставлять під загрозу національну безпеку України.<br><br>Тому уже зараз можна спрогнозувати, що подібні конфлікти між ЗМІ та можновладцями будуть виникати в недалекому майбутньому, якщо врешті-решт оборонну промисловість не зроблять більш прозорою та ефективною.<br><br>Цікаво, що про нагальну потребу реформувати оборонний сектор говорять і експерти за океаном.<br><br><b>Американо-Українська Ділова Рада</b> звернулася до Президента Петра Порошенка, Премєр-міністра Володимира Гройсмана та Голови парламенту Андрія Парубія з пропозиціями зменшити рівень секретності в оборонних закупівлях та надати замовникам державного оборонного замовлення права укладання прямих контрактів з іноземними постачальниками.<br><br>Відповідна законодавча база готова для опрацювання. Потребує лише політичної волі.<br><br>Нижче наводжу повний текст звернення Ділової Ради. Можливо, листи із США, країни яка вважається найнадійнішим союзником у війні з Росією, допоможуть запустити необхідні реформи.<br><br><i>Президенту України<br><br>пану Петру ПОРОШЕНКУ<br><br>Шановний пане Президенте!<br><br>Від імені Американо-Української Ділової Ради (U.S.-Ukraine Business Council/USUBC) засвідчуємо Вам глибоку повагу та звертаємось із наступним питанням.<br><br>Ситуація з агресією Російської Федерації проти України та окупацією українських територій вимагає суттєвого удосконалення системи постачання та переозброєння Збройних Сил України. Передусім це стосується регулювання системи закупівель озброєння та військової техніки (далі – ОВТ) в межах державного оборонного замовлення.<br><br>На цей час склався вражаючий дисбаланс у розвитку вітчизняного оборонно-промислового комплексу (далі – ОПК), пов'язаний із тим, що всередині комплексу діють непрозорі та занадто утаємничені процедури. Найбільш негативними наслідками цього є непривабливість українського ринку для іноземних компаній. За даними Міністерства економічного розвитку та торгівлі України, 95% номенклатури ОВТ закуповуються в межах державного оборонного замовлення (далі – ДОЗ) без конкурентних процедур, а самі закупівлі утаємничені під грифом "цілком таємно".<br><br>При цьому, однією з проблем вітчизняного ОПК є те, що країна не здатна забезпечити більшу частину потреб військових формувань в найважливішій номенклатурі ОВТ і послуг (у грошовому еквіваленті це, за оцінками Центру досліджень армії, конверсії та роззброєння, не менше 60-70%). Причина полягає в тому, що Україна ніколи не виробляла й не виробляє бойових літаків, комплексів протиповітряної оборони, корабельного озброєння, бойових вертольотів тощо. Ситуація значно ускладнилась після розриву кооперації з Росією, а розробка та налагодження виробництва в країні по цим напрямам лише планується.<br><br>Проблема підсилюється ще тим, що відповідно до вимог чинного законодавства (Закони України "Про державне оборонне замовлення" та "Про зовнішньоекономічну діяльність") система закупівель ОВТ за імпортом суттєво обмежена тим, що державні замовники зобов'язані здійснювати закупівлі переважно через спеціальних експортерів, більша частина яких знаходиться у складі ДК "Укроборонпром".<br><br>Відповідно до звіту RAND Corp. "Security Sector Reform in Ukraine" ("Реформа безпекового сектору в Україні"), ДК "УкрОборонПром" завищує ціни на імпорт від 5 до 20% і більше. При цьому ДК "УкрОборонПром" має конфлікт інтересів: його компанії виробляють зброю та техніку для українських військових, тому ДК "УкрОборонПром" має негативний стимул, щоб імпортувати товари, які можуть бути вироблені та надані її ж власними компаніями.<br><br>Одночасно з проблемами нереформованої системи закупівель Україна потерпає від масштабної корупції, однією з головних причин якої є надмірне засекречення будь-якої інформації про забезпечення Збройних Сил України.<br><br>У більшості розвинутих країн інформація про закупівлі звичайних (конвенційних) озброєнь є загальнодоступною.<br><br>Переконані, що на четвертий рік війни система закупівель ОВТ має бути удосконалена на законодавчому рівні шляхом надання прав державним замовникам на здійснення повного циклу закупівлі ОВТ за імпортом, без залучення спеціальних експортерів.<br><br>Одночасно з цим Уряд має спростити і стандартизувати процедури отримання доступу до конфіденційної інформації. Це ключ до забезпечення того, щоб секретність не використовувалась для прикриття корупції, неефективності або помилок.<br><br>При цьому, здійснення таких законодавчих змін обумовлено керівними плановими документами у сфері безпеки та оборони, в першу чергу Стратегічним Оборонним Бюлетенем (пункт 2.5.1.); відповідальними за розроблення законодавчих зміни визначено Міноборони та Мінекономрозвитку із терміном виконання до кінця 2017 року.<br><br>За таких умов звертаємось до Вас, вельмишановний пане Президенте, з пропозицією розглянути наступні рекомендації щодо зменшення рівня секретності в оборонних закупівлях та надання державним замовникам з ДОЗ права укладання прямих контрактів з іноземними постачальниками. Дані рекомендації оформлені у вигляді двох проектів Закону України та коротких пояснювальних записок до них, які готові до реєстрації в парламенті (див. додатки до листа). Проекти Законів України були розроблені за сприяння неурядової організації Фонд "Вільна Україна" (Ukrainian Freedom Fund), що є членом Американсько-Української Ділової Ради.<br><br>Американсько-Українська Ділова Рада є приватною неприбутковою професійною бізнес-асоціацією, яка представляє інтереси американських компаній, що працюють в Україні, та українських компаній, які мають тісні ділові стосунки з бізнесом США. Наша організація сприяє розвитку двосторонніх торговельно-економічних зв'язків через регулярну взаємодію між бізнес-лідерами та політичними елітами США та України. Серед майже 200 членів нашої організації є всесвітньо відомі транснаціональні корпорації, великі американські та українські компанії, a також юридичні фірми, зацікавлені у розвитку міцних бізнесових стосунків між США та Україною.<br><br>З повагою,<br><br></i></p>     
        </div>

    </div>

    <div class="comments-item">
        <div class="comment-wrapper" id="cdaec8da27">
    <div id="comment-pjax-container-w0" data-pjax-container="" data-pjax-timeout="20000">    <div class="comments row">
        <div class="col-md-12 col-sm-12">
            <div class="title-block clearfix">
                <h3 class="comment-title">
                    Комментарии (0)                </h3>
            </div>



        
    <div id="w1" class="new-comments">

        <div style="background-color: #F3F3F3;" class="item comment" id="comment-1">
            <div class="item-image">
                <span class="item-image-user"><img src="http://www.gravatar.com/avatar?d=mm&amp;f=y&amp;s=50" alt="User"></span>
            </div>
            <div class="item-content">
                <p class="user-name">test<span class="user-date">03.04.2018</span></p>
                <div class="user-descr">sdf sfs df sdfsdfs </div>

            </div>
            <div class="triang-img"></div>
        </div>


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
    <form name="com" id="comment-form" class="comment-box" action="" method="post">
        {{ csrf_field() }}
        
        <div class="forma" style="display: flex; justify-content: space-between; margin-bottom: 10px;">
            <div class="auth" style="width: 49%;">
                <input style="width: 100%;" class="form-control" type="text" name="name" placeholder="Имя">
            </div>
            <div class="auth" style="width: 49%;">
                <input style="width: 100%;" class="form-control" type="email" name="email" placeholder="Email">
            </div>
        </div>

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



        </div>

        <div class="more-news-item">

            <h4>Читайте также</h4>
            <div id="w2" class="list-view">

<div data-key="28">
    <div class="item-news">
        <div class="item-image">
            <span class="item-image-date">03.05.2017</span>
            <div class="img" style="width: 100px; margin: 10px 10px 0px 0px;">
                <img style="width: 100%;" src="sfsdfsdf.jpg" alt="">
            </div>
        </div>
        <div class="item-content">
            <p class="ellipsis"><a href="">test</a></p>
            <div class="entry-meta-descr"><p style="text-align: justify;">sdfsf sdfsdf sdf sd f</div>
        </div>
    </div>
</div>


</div>
        </div>

    </div>


                <div class="col-sm-4 col-lg-3 hidden-xs category-left-block">

                    <div class="user">
                        <div class="img"><img src="{{ asset('/images/657220.jpg') }}" alt=""></div>
                        <div class="name-user">
                            <h3>Test Name</h3>
                            <p>Голова експертної організації StateWatch, Антикорупційна група РПР</p>
                        </div>

                        <div class="form-conteiner">
                            <form action="">
                                <div class="form">
                                    <div class="file-upload">
                                         <label>
                                              <input type="file" name="file">
                                              <span>Выберите фото</span>
                                         </label>
                                    </div>
                                    <div class="button">
                                        <button>Загрузить фото</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="add-article">
                            <a href="">Добавить статью</a>
                        </div>

                    </div>

                    <div class="entry-post">
                        <h3>Актуальное в блоге</h3>
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
                                    <p class="ellipsis"><a href="">{{ mb_substr($sitebar->title, 0, 60)."..." }}</a></p>
                                    <div class="entry-meta bg-{{ rand(1,9) }}">
                                        @if($sitebar->visible == 1)
                                            {{ $sitebar->catigor }}
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div></div>

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                </div>

            </div>
        </div>
    </section>

</section>
@endsection