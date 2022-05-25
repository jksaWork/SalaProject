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
                                                onchange="SelectChange();">
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
                                    <div class="col-sm-4" hidden="hidden">
                                        <div class="form-group">
                                            <div class="form-group">
                                                <label for=""> Sall code</label>
                                                <input type="text" class="form-control" readonly name="botagaty"
                                                    id="SalaProductId" aria-describedby="helpId" placeholder="">
                                                {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                                            </div>
                                        </div>
                                    </div>
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
            botagate_product_codes = FilterdArray[0].botagate_product_code
            console.log(FilterdArray[0]['botagaty_product_name']);
            console.log(botagate_product_codes);
            document.getElementById("SalaProductId").value = botagate_product_codes;

        }
    </script>
@endsection
