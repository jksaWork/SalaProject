@extends('Admin.app')
@section('BreadCrumbs', 'Link Product')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Link Product</h6>
                            <a href="{{ route('related.Products') }}" class="btn btn-sm btn-outline-primary">
                                Show Linked Products
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""> Sall Product </label>
                                        <select class="form-control choices " name="" id="sallaProduct">
                                            @foreach ($SalaProduct as $Product)
                                                <option value="{{ $Product->product_id }}">{{ $Product->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""> Botagaty Product </label>
                                        <select class="form-control choices form-select choices__input" data-choice="active"
                                            name="" id="BotagatyProduct">
                                            @foreach ($BotagatyProduct as $Product)
                                                <option value="{{ $Product->product_code }}">{{ $Product->name->ar }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""> Quantity Product </label>
                                        <input type="number" class="form-control" id="Quantity">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div>



                                    <a onclick="PerformRequestByAjax()"
                                        class="btn btn-sm btn-outline-primary align-self-center " type="button"
                                        style="padding: inherit;padding: 5px 15px;">

                                        link
                                    </a>
                                </div>
                            </div>
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
        console.log('jksa altignai');
        $('select').select2();

        function PerformRequestByAjax() {

            var sallaProduct, BotagatyProduct, Quantity;
            // get Requst
            User = @json(auth()->user()->id);
            console.log(User);
            BotagatyProduct = $('#BotagatyProduct').val();
            sallaProduct = $('#sallaProduct').val();
            Quantity = $('#Quantity').val();
            data = {
                'qunatity': Quantity,
                'sala_product': sallaProduct,
                'botagaty_product': BotagatyProduct,
                'client_id': User,
            };
            var myHeaders = new Headers();
            myHeaders.append("Authorization", "Bearer 1|252iDTnkNYbL6vvuNalm8EJTEb24V6hzZMTFvGj0");
            myHeaders.append("Content-Type", "application/json");

            var raw = JSON.stringify({
                'qunatity': Quantity,
                'sala_product': sallaProduct,
                'botagaty_product': BotagatyProduct,
                'client_id': User,
            });
            console.log(raw);
            var requestOptions = {
                method: 'POST',
                headers: myHeaders,
                body: raw,
                // redirect: 'follow'
            };

            fetch("http://localhost:8000/api/test", requestOptions)
                .then(response => response.json())
                .then(function(res) {
                    console.log(res);
                    if (res.code == 1) {
                        Swal.fire(
                            'Good job!',
                            res.message,
                            'success'
                        );
                        $('#success_message').show();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: res.messages,
                            text: 'Something went wrong!',
                        });
                    }
                })
                .catch(error => console.log('error', error));
            console.log('clieced');
        }
    </script>
@endsection
