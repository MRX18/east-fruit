<div class="form-container" style="padding-bottom: 20px;">
    @if(count($errors->all()) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('table-price') }}" method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlSelect1">Страна</label>
            <select class="form-control" id="exampleFormControlSelect1" name="market">
                @foreach($markets as $market)
                    <option value="{{ $market->id }}">{{ $market->market }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категории</label>
            <select class="form-control" id="exampleFormControlSelect1" name="product">
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Дата</label>
            <input type="date" class="form-control" id="exampleFormControlInput1" name="date">
        </div>
        <button type="submit" class="btn btn-primary">Получить</button>
    </form>
</div>

@if(isset($specification))
    @if($specification == false)
        <h3>Для указанной категории нет спецификаций!</h3>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Страна</th>
                <th scope="col">Категории</th>
                <th scope="col">Спецификация</th>
                <th scope="col">Дата</th>
                <th scope="col">Цена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($specification as $s)
            <tr>
                <td>{{ $name_market->market }}</td>
                <td>{{ $name_product->name }}</td>
                <td>{{ $s->title }}</td>
                <td>{{ $date }}</td>
                @if(count($s->price) > 0)
                    <td>Есть</td>
                @else
                    <td><a href="/admin/prices/create?date={{ $date }}&id_market={{ $name_market->id }}">Нету</a></td>
                @endif
            </tr>
            </tbody>
            @endforeach
        </table>
    @endif
@endif