@extends('layouts.main')
@section('content')

<section id="main-section">
	<section id="news-section">
		<div class="container">
			<div class="content" style="margin-top: 30px; margin-bottom: 50px;">
				@if (count($errors) > 0)
				  <div class="alert alert-danger">
				    <ul>
				      @foreach ($errors->all() as $error)
				        <li>{{ $error }}</li>
				      @endforeach
				    </ul>
				  </div>
				@endif
				<form class="form-horizontal" action="{{ route('price') }}" method="post">
				{{ csrf_field() }}
				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Период</label>
				    <div class="col-sm-10">
				      <div class="form-inline">

				      	<div class="form-group" style="margin-right: 0px; margin-left: 0px;">
				      		  <label style="font-size: 14px;" for="exampleInputName2">С </label>
						      <select class="form-control" name="deyMin">
						      	@for($i=1; $i<=31; $i++)
									@if(strlen($i) == 1)
										<option value="{{ '0'.$i }}">{{ '0'.$i }}</option>
									@else
										<option value="{{ $i }}">{{ $i }}</option>
									@endif
						      	@endfor
						      </select>
						      <select class="form-control" name="monthMin">
						      	@for($i=1; $i<=12; $i++)
									@if(strlen($i) == 1)
										<option value="{{ '0'.$i }}">{{ '0'.$i }}</option>
									@else
										<option value="{{ $i }}">{{ $i }}</option>
									@endif
						      	@endfor
						      </select>
						      <select class="form-control" name="yearMin">
						      	@for($i=2000; $i<=2025; $i++)
									<option value="{{ $i }}">{{ $i }}</option>
						      	@endfor
						      </select>
						</div>

						<div class="form-group" style="margin-right: 0px; margin-left: 0px;">
				      		<label style="font-size: 14px;" for="exampleInputName2">По </label>
						      <select class="form-control" name="deyMax">
						      	@for($i=1; $i<=31; $i++)
									@if(strlen($i) == 1)
										@if($date[2] == '0'.$i)
										<option selected="selected" value="{{ '0'.$i }}">{{ '0'.$i }}</option>
										@else
										<option value="{{ '0'.$i }}">{{ '0'.$i }}</option>
										@endif
									@else
										@if($date[2] == $i)
										<option selected="selected" value="{{ $i }}">{{ $i }}</option>
										@else
										<option value="{{ $i }}">{{ $i }}</option>
										@endif
									@endif
						      	@endfor
						      </select>
						      <select class="form-control" name="monthMax">
						      	@for($i=1; $i<=12; $i++)
									@if(strlen($i) == 1)
										@if($date[1] == '0'.$i)
										<option selected="selected" value="{{ '0'.$i }}">{{ '0'.$i }}</option>
										@else
										<option value="{{ '0'.$i }}">{{ '0'.$i }}</option>
										@endif
									@else
										@if($date[1] == $i)
										<option selected="selected" value="{{ $i }}">{{ $i }}</option>
										@else
										<option value="{{ $i }}">{{ $i }}</option>
										@endif
									@endif
						      	@endfor
						      </select>
						      <select class="form-control" name="yearMax">
						      	@for($i=2000; $i<=2025; $i++)
						      		@if($date[0] == $i)
									<option selected="selected" value="{{ $i }}">{{ $i }}</option>
									@else
									<option value="{{ $i }}">{{ $i }}</option>
									@endif
						      	@endfor
						      </select>
						</div>

					  	</div>
				    </div>
				  </div>

					<div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Страны</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="market">
				      	@foreach($markets as $velue)
							<option value="{{ $velue->id }}">{{ $velue->market }}</option>
				      	@endforeach
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Категории</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="product">
				      	@foreach($products as $velue)
							<option value="{{ $velue->id }}">{{ $velue->name }}</option>
				      	@endforeach
				      </select>
				    </div>
				  </div>

				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Тип валюты</label>
				    <div class="col-sm-10">
				      <select class="form-control" name="currency">
				      	@foreach($currencys as $velue)
							<option value="{{ $velue->id }}">{{ $velue->currency }}</option>
				      	@endforeach
				      </select>
				    </div>
				  </div>


				  <div class="form-group">
				    <label for="inputEmail3" class="col-sm-2 control-label">Цена</label>
				    <div class="col-sm-10">
				      <div class="form-inline">

						    <label class="radio-inline">
								  <input type="radio" name="price" id="inlineRadio1" value="1"> Минимальная
								</label>
								<label class="radio-inline">
								  <input type="radio" name="price" id="inlineRadio2" value="2"> Максимальная
								</label>
								<label class="radio-inline">
								  <input type="radio" name="price" id="inlineRadio3" value="3"> Средняя
								</label>

					  	</div>
				    </div>
				  </div>

				  <div class="form-group">
				    <div class="col-sm-offset-2 col-sm-10">
				      <button type="submit" class="btn btn-default">Показать</button>
				    </div>
				  </div>
				</form>
			</div>
			
			@if(isset($error))
				@if($error == false)
				<div class="tabl" style="margin-bottom: 50px;">
					<table class="table">
					  <thead class="thead-default">
					    <tr>
					      <th scope="row">Рынок</th>
					      <th>Товар</th>
					      <th>Цена</th>
					      <th>Период</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <td scope="row">{{ $marketTable }}</td>
					      <td>{{ $productTable }}</td>
					      <td>{{ $priceTable }}</td>
					      <td>{{ $dateTable }}</td>
					    </tr>
					  </tbody>
					</table>
				</div>
				@elseif($error == true)
					<div class="alert alert-danger" style="margin-bottom: 50px;">
				    	По вашему запросу ничего не найдено!
				 	</div>
				@endif
			@endif
		</div>
	</section>
</section>


@endsection