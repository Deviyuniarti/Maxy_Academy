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

<!-- Tempatkan canvas untuk Chart.js -->
<div style="margin: 20px;">
    <canvas id="productChart" width="400" height="200"></canvas>
</div>

<!-- Include jQuery, Moment.js, Daterangepicker, Select2, dan Chart.js -->
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // Aktifkan Daterangepicker
    $('input[name="dates"]').daterangepicker();

    // Aktifkan Select2
    $('.js-example-basic-single').select2();

    // Inisialisasi Chart.js
    var ctx = document.getElementById('productChart').getContext('2d');
    var productChart = new Chart(ctx, {
        type: 'bar', // Tipe chart, bisa disesuaikan dengan keinginan (bar, line, pie, dll)
        data: {
            labels: [
                @foreach($productData as $product)
                    "{{ $product->name }}",
                @endforeach
            ],
            datasets: [{
                label: 'Product Stock',
                data: [
                    @foreach($productData as $product)
                        {{ $product->stock }},
                    @endforeach
                ],
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@endsection
