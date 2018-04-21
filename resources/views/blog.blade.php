@extends('layouts.main')
@section('content')
<section id="main-section">

    <section id="news-section">
        <div class="container">
            <div class="row no-gutter">
                <div class="col-sm-8 col-lg-9">

                    <div class="wrapper-category">
                        <div id="w0" class="cont">
                            
                            <div class="articles-blog">

								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

                            </div>



                            <div class="articles-blog">
								<h3>Другие новости</h3>
								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

								<div class="article">
									<div class="img">
										<img src="{{ asset('/images/657220.jpg') }}" alt="">
									</div>
									<div class="information">
										<span class="name">Test name</span>
										<h3><a href="#">Американо-Українська Ділова Рада закликала Президента реформувати оборонну промисловість </a></h3>
										<span class="text">Гучний конфлікт між головою парламентського комітету з питань оборони Сергієм Пашинським та журналом "Новое Время" суспільству подається як проблема кількох міжнародних контрактів, яку в цілому можна вирішити одним засіданням згаданого комітету...</span>
										<span class="date">21.04.2018</span>
									</div>
								</div>

                            </div>

                    </div>
                    <div class="category-button">
                        
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
					                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->id]) }}">{{ mb_substr($sitebar->title, 0, 60)."..." }}</a></p>
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
    </section>

    <section id="slider-section">
        <div class="container">
            <div class="row no-gutter">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                    </ol>

                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="col-sm-6 col-lg-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6 col-lg-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>

                        <div class="item">
                            <div class="col-sm-6 col-md-6 text">
                                <div class="video-container">
                                    <iframe src="https://player.vimeo.com/video/115603554?title=0&byline=0&portrait=0"
                                            class="video" title="Advertisement"></iframe>
                                </div>
                            </div>
                            <div class="col-sm-6 col-lg-6 text">
                                <h3>В Турции повысился урожай цитрусовых</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                    incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud
                                    exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute
                                    irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                    pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
                                    deserunt mollit anim id est laborum.</p>
                                <p><span>05 МАР 09:30</span></p>
                                <p><a href="index.html@id=3.html">Подробнее</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</section>
@endsection