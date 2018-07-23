{{--<canvas id="myChart"></canvas>--}}

{{--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.js"></script>--}}
<script type="text/javascript">
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: [
                @foreach($date as $value)
                "{{ $value }}",
                @endforeach
            ],

            datasets: [
                @foreach($markets as $market)
                    {
                        label:
                            "{{ $market->market }}"
                        ,


                        backgroundColor: 'transparent',
                        borderColor: 'rgb({{ rand(0, 255) }}, {{ rand(0, 255) }}, {{ rand(0, 255) }})',
                        data: [
                            @foreach($prices as $price)
                                @if($price->id_market == $market->id)
                                {{ $price->price_input }},
                                @endif
                            @endforeach
                        ],
                    },
                @endforeach
                // {
                //     label: "My First dataset",
                //     backgroundColor: 'transparent',
                //     borderColor: 'rgb(205, 99, 172)',
                //     data: [47589, 25879, 36925],
                // },
            ]
        },

        // Configuration options go here
        options: {}
    });
</script>