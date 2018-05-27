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
                                @foreach($articles as $article)
								<div class="article">
									<div class="img">
										<img src="{{ asset($article->img_user) }}" alt="">
									</div>
									<div class="information">
										<span class="name">{{ $article->name_user }}</span>
										<h3><a href="{{ route('articleBlog', ['id'=>$article->id]) }}">{{ $article->title }}</a></h3>
										<span class="text">{!! mb_substr($article->text, 0, 200).'...' !!}</span>
										<span class="date" style="display: block; color: #000; font-size: 12px; margin-top: 5px;">{{ $article->date }}</span>
									</div>
								</div>
                                @endforeach
                                <div class="category-button">
                                    {{ $articles->links() }}
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
                            @if (count($errors) > 0)
                              <div class="alert alert-danger">
                                <ul>
                                  @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                  @endforeach
                                </ul>
                              </div>
                            @endif 
                			<form action="{{ route('blog') }}" method="post" enctype="multipart/form-data">
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
                                        <input type="text" name="name" class="form-control" id="name" value="{{ $user->name }}">
                                    </div>
                                    

                                    <div class="form-group">
                                          <label style="font-size: 14px;" for="exampleInputName2">Род деятельности</label>
                                          <div>
                                          <select id="position-select" class="form-control" name="positionSelect">
                                            @if($user->id_occupation == 0)
                                                <option disabled selected>Выберите род деятельности</option>
                                            @endif

                                            @foreach($occupations as $occupation)
                                                @if($occupation->id == $user->id_occupation)
                                                    <option selected value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                                @else
                                                    <option value="{{ $occupation->id }}">{{ $occupation->title }}</option>
                                                @endif
                                            @endforeach
                                            <option id="otherR" value="9999">Другое ( укажите род деятельности) </option>
                                          </select>
                                          </div>
                                    </div>

                                    <div class="form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                        <label for="position">Должность</label>

                                        <div>
                                            <input id="position" type="position" class="form-control" name="position" value="{{ $user->position }}" disabled>

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

                		<div class="add-article">
                			<a href="{{ route('addblog') }}">Добавить статью</a>
                		</div>
                        @else
                        <div class="add-article">
                            <a href="/login">Авторизироваться</a>
                        </div>
                        @endif

                	</div>

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
					                <p class="ellipsis"><a href="{{ route('article', ['id'=>$sitebar->slug]) }}">{{ $sitebar->title }}</a></p>
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

                    <div class="banner-category">
                        <img src="../../images/page-category/Layer&#32;920.png" alt="Banner">
                    </div>

                </div>
            </div>
    </section>

    <!-- <section id="slider-section">
        <div class="container">
            <div class="row no-gutter">
                <div id="myCarousel" class="carousel slide" data-ride="carousel"> -->
                    <!-- Indicators -->
                    <!-- <ol class="carousel-indicators">
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
    </section> -->

</section>
@endsection