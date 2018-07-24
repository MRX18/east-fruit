<div class="tabl" style="margin-bottom: 50px;">
    <table class="table">
        <thead class="thead-default">
        <tr>
            <th scope="row">Рынок</th>
            <th>Товар</th>
            <th>Спецификация</th>
            <th>Цена</th>
            <th>Валюта</th>
            <th>Дата</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prices as $price)
            <tr>
                <td scope="row">{{ $price->id_market }}</td>

                <td>{{ $price->id_product }}</td>

                <td>{{ $price->id_specification }}</td>

                <td>{{ $price->price_input }}</td>

                <td>{{ $price->currency }}</td>

                <td>{{ $price->allDate }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>