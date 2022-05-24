@extends('Admin.app')
@section('BreadCrumbs', 'Link Product')
@section('content')

    {{-- @dd($BotagatyProducty); --}}

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <form action="" method="get">
                            @csrf
                            <div>
                                <div class="row ">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Sall Product </label>
                                            <select class="form-control choices " name="" id="sallaProduct"
                                                onchange="SelectChange()">
                                                @foreach ($Products as $BotagatyProduct)
                                                    <option value="{{ $BotagatyProduct['sala_product_id'] ?? '' }}">
                                                        {{ $BotagatyProduct->sala_product_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for="">botagaty</label>
                                                <input type="text" class="form-control" readonly name="" id="BotagatyId"
                                                    aria-describedby="helpId" placeholder="">
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Quantity Product </label>
                                            <input type="number" class="form-control" id="Quantity">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>

                            <br>
                            <div class="row">
                                <div>
                                    <button class="btn btn-primary" onclick="PerformRequestByAjax()">
                                        buy
                                    </button>
                                </div>
                            </div>
                        </FORM>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Products = @json($Products);
        console.log(Products.data);

        function SelectChange() {

            SallaCode = document.getElementById('sallaProduct').value;
            console.log(SallaCode);
            FilterdArray = Products.data.filter((el) => el.sala_product_id == SallaCode);
            console.log(FilterdArray);
            console.log(FilterdArray.botagaty_product_name);
            document.getElementById("BotagatyId").value = FilterdArray[0]['botagaty_product_name'];
        }
    </script>
@endsection
