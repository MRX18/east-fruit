@extends('layouts.main')
@section('content')

<section id="main-section">
	<section id="news-section">
		<div class="container">
			<div class="content" style="margin-top: 30px; margin-bottom: 50px;">
				<form class="form-horizontal">

				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Период</label>
				    <div class="col-sm-10">
				      <div class="form-inline">

				      	<div class="form-group" style="margin-right: 30px; margin-left: 0px;">
				      		<label for="exampleInputName2">С </label>
						      <select class="form-control">
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      </select>
						      <select class="form-control">
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      </select>
						      <select class="form-control">
						      	<option value="1">2018</option>
						      	<option value="1">2017</option>
						      	<option value="1">2016</option>
						      	<option value="1">2015</option>
						      </select>
						    </div>

						    <div class="form-group">
				      		<label for="exampleInputName2">По </label>
						      <select class="form-control">
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      </select>
						      <select class="form-control">
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      	<option value="1">1</option>
						      </select>
						      <select class="form-control">
						      	<option value="1">2018</option>
						      	<option value="1">2017</option>
						      	<option value="1">2016</option>
						      	<option value="1">2015</option>
						      </select>
						    </div>

					  	</div>
				    </div>
				  </div>

					<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Рынки</label>
				    <div class="col-sm-10">
				      <select class="form-control">
				      	<option value="1">Украина</option>
				      	<option value="1">Грузия</option>
				      	<option value="1">Болгария</option>
				      	<option value="1">Турция</option>
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Товары</label>
				    <div class="col-sm-10">
				      <select class="form-control">
				      	<option value="1">Помидоры</option>
				      	<option value="1">Абрикосы</option>
				      	<option value="1">Алыча</option>
				      	<option value="1">Бананы</option>
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Цена</label>
				    <div class="col-sm-10">
				      <div class="form-inline">

						    <label class="radio-inline">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1"> Минимальная
								</label>
								<label class="radio-inline">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2"> Максимальная
								</label>
								<label class="radio-inline">
								  <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3"> Средняя
								</label>

					  	</div>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Позать</button>
				    </div>
				  </div>
				</form>
			</div>
		</div>
	</section>
</section>


@endsection