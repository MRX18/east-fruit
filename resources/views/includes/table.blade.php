<div class="tabl" style="margin-bottom: 50px;">
    <a href="{{ route('exportExcel').$linkExcel }}">Скачать</a>
    <table class="table">
        <thead class="thead-default">
        <tr>
            <th scope="row">Рынок
                <button class="filter-bottom" data-filter="id_market"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="id_market"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
            <th>Товар
                <button class="filter-bottom" data-filter="id_product"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="id_product"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
            <th>Спецификация
                <button class="filter-bottom" data-filter="id_specification"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="id_specification"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
            <th>Цена
                <button class="filter-bottom" data-filter="price_input"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="price_input"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
            <th>Валюта
                <button class="filter-bottom" data-filter="currency"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="currency"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
            <th>Дата
                <button class="filter-bottom" data-filter="date"><i class="fas fa-filter"></i><i class="fas fa-arrow-down"></i></button>
                <button class="filter-top" data-filter="date"><i class="fas fa-filter"></i><i class="fas fa-arrow-up"></i></button>
            </th>
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

<script>
    /*--filters data in table page price--*/
    $('.filter-bottom').on('click', function() {
        var filter = $(this).attr("data-filter");
        $('#filter-bottom').val(filter);
        $('#filter-top').val(null);

        $('.form-horizontal').submit();
    });

    $('.filter-top').on('click', function() {
        var filter = $(this).attr("data-filter");
        $('#filter-top').val(filter);
        $('#filter-bottom').val(null);

        $('.form-horizontal').submit();
    });


    {{--$('.export-excel').on('click', function(e) {--}}
        {{--e.preventDefault();--}}

        {{--var data = {--}}
            {{--'_token' : "{!! csrf_token() !!}",--}}
            {{--'data': $(this).attr("data-excel")--}}
        {{--};--}}

        {{--$.ajax({--}}
            {{--type: "POST",--}}
            {{--url: "/excel",--}}
            {{--data: data,--}}
            {{--success: function(res) {--}}
                {{--console.log("200");--}}
            {{--},--}}
            {{--error: function(error) {--}}
                {{--console.log("500");--}}
            {{--}--}}
        {{--});--}}
    {{--});--}}
</script>