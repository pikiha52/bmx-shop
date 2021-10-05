@extends('layout.app')

@section('title', 'Mic Ride - Details Parts')

@section('container')

<link rel="stylesheet" href="{{ url('assets/css/site.min.css')}}">

<!-- Start Checkout Area -->

<!-- get province id adn kota id dari tabel admin  -->

<!--  -->
<br>
<section class="wn__checkout__area section-padding--lg bg__white">
    <div class="container">
        <div class="card border">
            <div class="card-body">
                @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <div class="d-flex"><span class="w-40 avatar circle gd-success"></span>
                        <div class="mx-3"><strong>{{ $message }},</strong> carts has been updated.</div>
                    </div><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                @endif
                <form action="{{ url('order/store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-12">
                            <div class="customer_details">
                                <h3>Billing details</h3>
                                <div class="customar__field">
                                    <div class="input_box">
                                        <label>Name <span>*</span></label>
                                        <input type="text" name="nama" value="">
                                    </div>
                                    <div class="input_box">
                                        <label>Number Phone <span>*</span></label>
                                        <input type="text" name="numberphone" value="">
                                    </div>
                                    <div class="input-box">
                                        <label for="">Province</label>
                                        <select name="provinsi_id" class="select__option">
                                            <option value="-">[Select Province]</option>
                                            @foreach($provinces as $province => $value)
                                            <option value="{{ $province }}">{{ $value }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="">City</label>
                                        <!--kecamatan_id -->
                                        <select name="kota_id" class="select__option">
                                            <option value="-">[Select City]</option>
                                        </select>
                                    </div>
                                    <div class="input_box">
                                        <label>Postcode / ZIP <span>*</span></label>
                                        <input type="text" name="kodepos" value="">
                                    </div>
                                    <div class="input_box">
                                        <label>Address <span>*</span></label>
                                        <input type="text" name="alamat" placeholder="Street address" value="">
                                    </div>
                                    <div class="input_box">
                                        <input type="text" name="details" placeholder="Apartment, suite, unit etc. (optional)" value="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 md-mt-40 sm-mt-40">
                            <div class="wn__order__box">
                                <h3 class="onder__title">Your order</h3>
                                <div class="input-box hidden"><label>Order ID</label>
                                    <input type="hidden" name="order_id" value="{{ $getIdOrder }}">
                                </div>
                                <ul class="order__total">
                                    <li>Product</li>
                                    <li>Total</li>
                                </ul>
                                <ul class="order_product">
                                    @forelse ($checkout as $check)
                                    <li>{{$check->part['merk']}} <span> × {{$check->qty}}</span></li>
                                    <input type="text" class="hidden" name="price" id="price" value="{{ $check->part['price'] }}">
                                    <div class="input-box hidden"><label>Id Parts</label>
                                        <input type="hidden" name="parts_id" value="{{$check->parts_id}}">
                                        <input type="hidden" name="check_id" value="{{$check->id}}">
                                    </div>
                                    @endforeach
                                </ul>
                                <div class="order_product">
                                    <div class="input-box">
                                        <label for="">Select Exspedisi</label>
                                        <select id="kurir" name="kurir" class="select__option kurir">
                                            <option value="0" selected>[Choose Exspedisi]</option>
                                            <option value="jne">JNE</option>
                                            <option value="pos">POS</option>
                                            <option value="tiki">TIKI</option>
                                        </select>
                                    </div>
                                    <div class="input-box">
                                        <label for="">Select Service</label>
                                        <select class="select__option layanan" id="layanan" name="layanan" onchange="calculateFunc()">
                                            <option value="" selected>[Choose Service]</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="input-box">
                                    <ul class="shipping__method">
                                        <input type="hidden" name="nama_layanan" class="form-control" value="" id="nama_layanan"> <!-- nama layanan -->
                                        <input type="hidden" name="harga_layanan" class="form-control" value="" id="harga_layanan"> <!-- harga -->
                                        <input type="hidden" name="estimasi" class="form-control" value="" id="estimasi"> <!-- estimasi -->
                                        <li>Estimasi <span id="etd_est">0 Days</span></li>
                                        <li>Cart Subtotal <span id="cart_total">Rp {{ number_format($check->part['price']) }}</span>
                                        <li>Price Ekspedisi <span id="price_ekspedisi">Rp 0</span>
                                        </li>
                                        <div class="input-box hidden"><label>Subtotal</label>
                                            <input type="hidden" name="subtotal" value="">
                                        </div>

                                    </ul>
                                    <ul class="total__amount">
                                        <li>Order Total <span id="calculateTotal">Rp {{ number_format($check->part['price']) }}</span></li>
                                    </ul>
                                    <div class="input-box hidden"><label>Total</label>
                                        <input type="hidden" name="total_belanja" id="total_belanja" value="">
                                    </div>
                                    <center>
                                        <button type="submit" class="btn-md btn-white">CHECKOUTS</button>
                                    </center>
                                    <br>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</section>
<!-- End Checkout Area -->

<!-- /modal edit -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous">
</script>

<script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>


<script>
    $(document).ready(function() {
        //ajax select kota asal
        $('select[name="province_origin"]').on('change', function() {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: 'cities/' + provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="city_origin"]').empty();
                        $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
                        $.each(response, function(key, value) {
                            $('select[name="city_origin"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="city_origin"]').append('<option value="">-- pilih kota asal --</option>');
            }
        });
        //ajax select kota tujuan
        $('select[name="provinsi_id"]').on('change', function() {
            let provindeId = $(this).val();
            if (provindeId) {
                jQuery.ajax({
                    url: 'cities/' + provindeId,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        $('select[name="kota_id"]').empty();
                        $('select[name="kota_id"]').append('<option value="">[Select City]</option>');
                        $.each(response, function(key, value) {
                            $('select[name="kota_id"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                $('select[name="kota_id"]').append('<option value="">[Select City]</option>');
            }
        });
        //ajax check ongkir
        let isProcessing = false;
        $('.btn-check').click(function(e) {
            e.preventDefault();

            let token = $("meta[name='csrf-token']").attr("content");
            let city_origin = $('select[name=city_origin]').val();
            let city_destination = $('select[name=kecamatan_id]').val();
            let courier = $('select[name=courier]').val();
            let weight = $('#weight').val();

            if (isProcessing) {
                return;
            }

            isProcessing = true;
            jQuery.ajax({
                url: "/ongkir",
                data: {
                    _token: token,
                    city_origin: city_origin,
                    city_destination: city_destination,
                    courier: courier,
                    weight: weight,
                },
                dataType: "JSON",
                type: "POST",
                success: function(response) {
                    isProcessing = false;
                    if (response) {
                        $('#ongkir').empty();
                        $('.ongkir').addClass('d-block');
                        $.each(response[0]['costs'], function(key, value) {
                            $('#ongkir').append('<li class="list-group-item">' + response[0].code.toUpperCase() + ' : <strong>' + value.service + '</strong> - Rp. ' + value.cost[0].value + ' (' + value.cost[0].etd + ' hari)</li>')
                        });

                    }
                }
            });

        });

    });
</script>

<script>
    $('select[name="kurir"]').on('change', function() {
        var layananku = $("#kurir option:selected").attr("namakurir");
        $("#nama_kurir").val(layananku);
        let origin = 115;
        console.log(origin);
        let destination = $("select[name=kota_id]").val();
        console.log(destination);
        let courier = $("select[name=kurir]").val();
        let weight = 1;
        if (courier) {
            jQuery.ajax({
                url: "origin=" + origin + "&destination=" + destination + "&weight=" + weight +
                    "&courier=" +
                    courier,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
                    $('select[name="layanan"]').empty();

                    $.each(data, function(key, value) {
                        console.log(value);
                        $.each(value.costs, function(key1, value1) {
                            $.each(value1.cost, function(key2, value2) {
                                // $('select[name="layanan"]').append('<option value="">-- Pilih Service --</option>');
                                $('select[name="layanan"]').append(
                                    '<option value="' + key +
                                    '"namaservice="' +
                                    '' + value1.service +
                                    '"hargaservice="' + value2.value +
                                    '' + key +
                                    '"estimasi="' +
                                    '' + value2.etd +
                                    '">' + value1
                                    .service + '-' + value2.etd + '-' +
                                    value2.value);
                            });
                        });
                    });
                }
            });
        } else {
            $('select[name="layanan"]').empty();
        }
        $('select[name="layanan"]').on('change', function() {
            var kurirku = $("#layanan option:selected").attr("namaservice");
            $("#nama_layanan").val(kurirku);
            var hargalayananku = $("#layanan option:selected").attr("hargaservice");
            $("#harga_layanan").val(hargalayananku);
            var nf = new Intl.NumberFormat();
            nf.format(hargalayananku); // "1,234,567,890"
            document.getElementById('price_ekspedisi').innerHTML = 'Rp' + ' ' + nf.format(hargalayananku);
            var waktu = $("#layanan option:selected").attr("estimasi");
            $("#estimasi").val(waktu);
            document.getElementById('etd_est').innerHTML = waktu + ' ' + 'Days'
        });
    });

    function calculateFunc() {
        var price = document.getElementById("price").value;
        console.log(price);
        var price_ekspedisi = document.getElementById('harga_layanan').value;
        console.log(price_ekspedisi);
        var calculate = Number(price) + Number(price_ekspedisi);
        console.log(calculate);
        var nf = new Intl.NumberFormat();
        nf.format(calculate); // "1,234,567,890"
        document.getElementById("calculateTotal").innerHTML = 'Rp' + ' ' + nf.format(calculate);
        $("#total_belanja").val(calculate);
    }
</script>





@endsection