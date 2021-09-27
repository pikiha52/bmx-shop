@extends('layout.app')
@section('title', 'Mic Ride - Detail Orders')

@section('container')

<style>
    .gradient-custom-2 {
        /* fallback for old browsers */
        background: #a1c4fd;

        /* Chrome 10-25, Safari 5.1-6 */
        background: -webkit-linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1));

        /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
        background: linear-gradient(to right, rgba(161, 196, 253, 1), rgba(194, 233, 251, 1))
    }

    #progressbar-1 {
        color: #455A64;
    }

    #progressbar-1 li {
        list-style-type: none;
        font-size: 13px;
        width: 33.33%;
        float: left;
        position: relative;
    }

    #progressbar-1 #step1:before {
        content: "1";
        color: #fff;
        width: 29px;
        margin-left: 22px;
        padding-left: 11px;
    }

    #progressbar-1 #step2:before {
        content: "2";
        color: #fff;
        width: 29px;
    }

    #progressbar-1 #step3:before {
        content: "3";
        color: #fff;
        width: 29px;
        margin-right: 22px;
        text-align: center;
    }

    #progressbar-1 li:before {
        line-height: 29px;
        display: block;
        font-size: 12px;
        background: #455A64;
        border-radius: 50%;
        margin: auto;
    }

    #progressbar-1 li:after {
        content: '';
        width: 121%;
        height: 2px;
        background: #455A64;
        position: absolute;
        left: 0%;
        right: 0%;
        top: 15px;
        z-index: -1;
    }

    #progressbar-1 li:nth-child(2):after {
        left: 50%
    }

    #progressbar-1 li:nth-child(1):after {
        left: 25%;
        width: 121%
    }

    #progressbar-1 li:nth-child(3):after {
        left: 25%;
        width: 50%;
    }

    #progressbar-1 li.active:before,
    #progressbar-1 li.active:after {
        background: #1266f1;
    }

    .card-stepper {
        z-index: 0
    }
</style>

<section class="vh-100 gradient-custom-2">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-md-10 col-lg-8 col-xl-6">
                <br>
                <br>
                <div class="card card-stepper" style="border-radius: 16px;">
                    <div class="card-header p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <p class="text-muted mb-2"> Order ID <span class="fw-bold text-body">{{ $order->id }}</span></p>
                                <p class="text-muted mb-0"> Place On <span class="fw-bold text-body">{{ date('Y-m-d', strtotime($order->created_at)) }}</span>
                                </p>
                                @if($order->payment_status == '2')
                                <p class="text-muted mb-0"> Status Pembayaran: <span class="fw-bold text-body">Sudah dibayar</span>
                                </p>
                                @endif
                            </div>
                            <div>
                                <h6 class="mb-0"> <a href="#">View Details</a> </h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-4">
                        <div class="d-flex flex-row mb-4 pb-2">
                            <div class="flex-fill">
                                <h5 class="bold">{{ $part->merk }}</h5>
                                <!-- <p class="text-muted"> Qt: 1 item</p> -->
                                <h4 class="mb-3">Rp {{ number_format($order->subtotal) }} <span class="small text-muted"> via ({{ $order->kurir }}) </span></h4>
                                <p class="text-muted">Estimasi: <span class="text-body">{{ $order->estimasi }}
                                        Days</span></p>
                                <!-- <p class="text-muted">Tracking Status on: <span class="text-body">11:30pm, Today</span></p> -->
                            </div>
                            <div>
                                <img class="align-self-center img-fluid" src="{{ $part->image }}" width="250">
                            </div>
                        </div>
                        <ul id="progressbar-1" class="mx-0 mt-0 mb-5 px-0 pt-0 pb-4">
                            <input type="hidden" name="" id="order_id" value="{{ $order->id }}">
                            @if($order->payment_status == '1')
                            <div class="alert alert-info alert-dismissible fade show" role="alert">
                                <strong>Segera lakukan pembayaran!</strong> Barang akan diproses setelah melakukan pembayaran.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @else
                            <li class="step0 active" id="step1"><span style="margin-left: 22px; margin-top: 12px;">PLACED</span></li>
                            <li class="step0 text-center" id="step2"><span>SHIPPED</span></li>
                            <li class="step0 text-muted text-end" id="step3"><span style="margin-right: 22px;">DELIVERED</span></li>
                            @endif
                        </ul>
                    </div>
                    <div class="card-footer p-4">
                        <div class="d-flex justify-content-between">
                            @if($order->payment_status == '1')
                            <div class="border-start h-100"></div>
                            <h5 class="fw-normal mb-0"> <button class="btn btn-info" id="pay-button">Bayar Sekarang</button></h5>
                            @else
                            <h5 class="fw-normal mb-0"><a href="#!">Track</a></h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<td class="hidden">
    <p class="hidden" id="result-json">as</p>
</td>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>
<script>
    const payButton = document.querySelector('#pay-button');
    payButton.addEventListener('click', function(e) {
        e.preventDefault();
        var order_id = document.getElementById('order_id').value;
        snap.pay('{{ $snapToken }}', {
            // Optional
            onSuccess: function(result) {
                /* You may add your own js here, this is just example */
                let statues = document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                if (result.transaction_status == 'settlement') {
                    fetch("{{ url('order/midtrans/notification') }}" + "/" + result.order_id)
                }
            },
            // Optional
            onPending: function(result) {
                /* You may add your own js here, this is just example */
                document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                console.log(result);
            },
            // Optional
            onError: function(result) {
                /* You may add your own js here, this is just example */
                let statues = document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
                if (result.status_code == '409') {
                    fetch("{{ url('order/midtrans/notification') }}" + "/" + order_id, {
                        method: 'POST',
                        
                    });
                }
            }
        });
    });
</script>

@endsection