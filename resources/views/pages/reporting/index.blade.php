    @extends('template.index')

    @section('content')
    <div style="text-align: center;">
        <h2>Halaman Reporting</h2>
    </div>

    <div style="margin: 20px;">
        <label for="dates">Filter by Date Range:</label>
        <input name="dates" id="dates">
    </div>

    <div style="margin: 20px;">
        <label for="product">Select Product(s):</label>
        <select class="js-example-basic-single" name="product" id="product" multiple="multiple">
            @foreach($productData as $product)
                <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    <div id="product_price_range">
        <canvas class="canvasChartProduct"></canvas>
    </div>
    <div id="output"></div>

    <!-- Include jQuery, Moment.js, Daterangepicker, Select2, dan Chart.js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script type="text/javascript" src="https://pivottable.js.org/dist/pivot.js"></script>
    <script>
        // Aktifkan Daterangepicker
        $('input[name="dates"]').daterangepicker();

        // Aktifkan Select2
        $('.js-example-basic-single').select2();
        $.ajax({
            url:'reporting/product',
            success: function ( response) {
                console.log(response, "<<<<<<<")
                $("#output").pivot(
                   response,
                    {
                        rows: ["created_range"],
                        cols: ["price_range"]
                    }
                );
                    }
                })

        var productPriceRange = {
            _defaults: {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        '< 50000',
                        '50000 - 99999',
                        '100000 - 999999',
                        '>= 1000000'
                    ],
                    datasets: [{
                        data: [],
                        backgroundColor: [
                            "#3498DB",
                            '#3498DB',
                            '#9B59B6',
                            '#E74C3C'
                        ],
                        hoverBackgroundColor: [
                            "#36CAAB",
                            "#49AEA",
                            "#B370CF",
                            "#E95EAF",
                        ]
                    }]
                },
                options: {
                    legend: false,
                    responsive: true  
                }
            },
            init: function($el){
                var self = this;
                $el = $($el);

                $.ajax({
                    url: 'reporting/chart-product',
                    success: function(response) {
                        console.log(response, "???????")
                        self._defaults.data.datasets[0].data = [
                            response.less_50000,
                            response._50000_99999,
                            response._100000_999999,
                            response.more_1000000
                        ];

                        var ctx = $el.find('canvas')[0].getContext('2d');
                        new Chart(ctx, self._defaults);  
                    }
                });
            }
        };
        productPriceRange.init($('#product_price_range'));

    </script>

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="https://pivottable.js.org/dist/pivot.css">

    @endsection