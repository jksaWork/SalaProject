@extends('Admin.app')
@section('BreadCrumbs', 'Link Product')
@section('content')

    {{-- @dd($BotagatyProducty); --}}

    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <form action="{{ route('add.order') }}" method="post">
                            @csrf
                            <div>
                                <div class="row ">

                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Sall Product </label>
                                            <select class="form-control choices " name="SallProduct" id="sallaProduct"
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
                                                <input type="text" class="form-control" readonly name="botagaty"
                                                    id="BotagatyId" aria-describedby="helpId" placeholder="">
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Quantity Product </label>
                                            <input name="quantity" value="quantity" type="number" class="form-control"
                                                id="Quantity">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label for=""> Sall Product </label>

                                            <select class="form-control choices ">
                                                @foreach ($Products as $prducts)
                                                    <option onchange="SelectChange2()" name="botagaty2" id="botagaty2"
                                                        value="{{ $prducts['product_code'] ?? '' }}" id=" SalaProductId">
                                                        {{ $prducts->sala_product_id }}</option>
                                                @endforeach
                                                {{-- @foreach ($Products as $prducts)
                                                    <select class="form-control choices type=" text" class="form-control"
                                                        readonly name="botagaty2" id="botagaty2" aria-describedby="helpId"
                                                        onchange="">
                                                        <option value="{{ $prducts['product_code'] ?? '' }}">
                                                        </option>
                                                @endforeach --}}
                                            </select>
                                        </div>
                                    </div>
                                    <br>

                                    <br>
                                    <div class="row">
                                        <div>
                                            <button type="submit" class="btn btn-primary" onclick="PerformRequestByAjax()">
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
            //   document.getElementById("SalaProductId").value = FilterdArray[0]['FilterdArray2.sala_product_id'];
        }
        Products2 = @json($prducts);
        console.log(Products2.data);

        function SelectChange2() {

            sallacode2 = document.getElementById('botagaty2').value;
            console.log(sallacode2);
            FilterdArray2 = Products2.data.filter((el) => el.sala_product_id == SallaCode2);
            console.log(FilterdArray2.sala_product_id);
            console.log(FilterdArray2);
            document.getElementById("SalaProductId").value = FilterdArray[3]['FilterdArray2.sala_product_id'];
        }
    </script>
@endsection
