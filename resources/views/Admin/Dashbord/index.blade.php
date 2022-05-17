@extends('Admin.app')
@section('BreadCrumbs', 'Dashboard')
@section('title', 'Dashboard')
@section('content')

    <div class="page-content">
        <section class="row">
            <div class="col-12 ">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <i class="bi bi-users"></i>
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Salla Products</h6>
                                        <h6 class="font-extrabold mb-0">{{$SallaCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Botagaty</h6>
                                        <h6 class="font-extrabold mb-0">{{$PosCount}}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Order </h6>
                                        <h6 class="font-extrabold mb-0">{{ $OrderCount }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 " >
                        <div class="card p-3">
                            <canvas id='chart' width="600" height="400"></canvas>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-xl-4">
                        <div class="card">
                            <div class="card-header">
                                <h4>Top Sala Product Ordered </h4>
                            </div>
                            <div class="card-body">
                                @forelse ($ProductOrdered as $Product )
                                <div class="d-flex justify-content-between mt-2">
                                    <div>
                                        <div class="d-flex align-items-center">
                                            <h5 class="mb-0 ms-3">{{$Product->product_name}}</h5>
                                        </div>
                                    </div>
                                    <div>
                                        <h5 class="mb-0">{{$Product->countt}}</h5>
                                    </div>
                                </div>
                                @empty
                                @endforelse
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-8">
                        <div class="card">
                            <div class="card-header">
                                <h4>Latest Orders</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover table-lg">
                                        <thead>
                                            <tr>
                                                <th>product</th>
                                                <th>Product Count</th>
                                                <th>date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse ($OrdersHistory as $Orders )
                                            <tr>
                                                <td class="col-auto">
                                                    {{$Orders->product_name}}
                                                </td>
                                                <td class="col-auto">
                                                    {{$Orders->ItemCont()}}
                                                </td>
                                                <td class="col-auto">
                                                    {{$Orders->getHumanDateAttribute()}}
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td>
                                                    No Order History
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    // alert('successfuly');
            const  data = @json($chartOne);
            console.log(data);
            const labels = data.map(item => item.label);
            console.log(labels);
            const CartData = {
                labels: labels,
                datasets: [{
                label: 'orders History',
                backgroundColor: 'rgb(30, 159, 242)',
                borderColor:'rgb(30, 159, 242)' ,
                data: data.map(item => item.Data),
                }]
            };
                const config = {
                type: 'line',
                data: CartData,
                options: {}
                };
                const myChart = new Chart(
                document.getElementById('chart'),
                config
                );
                console.log(CartData);
  </script>
@endsection

{{--
    const  array = @json($charttwo);
                // cahrt tow option -----------------------------------------
                const labels2 =  array.map(item => item.label);
                const CartData2 = {
                labels: labels2,
                datasets: [{
                label:'{{__('translation.orders.history')}}',
                backgroundColor: [
                      'rgb(255 ,145, 73,0.5)',
                      'rgb(102 ,110, 232,0.5)',
                      'rgb(40, 208, 148,0.5)' ,
                        'rgba(253, 73, 97, 0.5)',
                ],
                borderColor:[
                    'rgb(40, 208, 242 )' ,
                    'rgba(102, 110, 232)',
                    'rgb(30, 159, 242)',
                    'rgba(253, 73, 97)',
                ] ,
                data: array.map(item => item.Data),
                }]
            };
                const config2 = {
                    type: 'bar',
                    data: CartData2,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                };
                const myChart2 = new Chart(
                document.getElementById('myChart2'),
                config2
                ); --}}
