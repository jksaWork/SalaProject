@extends('layouts.Auth.Login_layouts')
@section('content')
    <main class="main-content  mt-0">
        <link rel="stylesheet" href="fm.selectator.jquery.css" />
        <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg"
            style="background-image: url('https://raw.githubusercontent.com/creativetimofficial/public-assets/master/argon-dashboard-pro/assets/img/signup-cover.jpg'); background-position: top;">
            <span class="mask bg-gradient-dark opacity-6"></span>
        </div>
        <div class="container">
            <div class="row  mt-md-n12 mt-n12 ">
                <div class="col-xl-12 col-lg-12 col-md-7 mx-auto">
                    <div class="card z-index-0 p-1">
                        <div class="card-body" style="overflow:hidden">
                            <div class="d-flex justify-content-between">
                                <h3>product table</h3>
                                <div class="options">
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        refresh Products
                                    </a>
                                    <a href="#" class="btn btn-sm btn-outline-primary">
                                        Refresh Botagaty Product
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <table class="table table-striped table-inverse " style="max-width: 100%">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>image</th>
                                            <th>name</th>
                                            <th>price</th>
                                            {{-- <th>type</th> --}}
                                            {{-- <th>stauts</th> --}}
                                            <th>botagate Product</th>
                                            <th>quantity</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($Products as $Product)
                                            <tr>
                                                {{-- <td>{{ $Product->id }}</td> --}}
                                                <td> <img src="{{ $Product->image }}" widtd="50px" height="50px" alt="">
                                                </td>
                                                <td>{{ $Product->name }}</td>
                                                <td>{{ $Product->price }}</td>
                                                {{-- <td>{{ $Product->quantity }}</td> --}}
                                                {{-- <td>{{ $Product->type }}</td> --}}
                                                {{-- <td>{{ $Product->status }}</td> --}}
                                                <td>
                                                    <div class="form-group">
                                                        <form action="{{ route('product.code.store') }}" method="post">
                                                            @csrf
                                                            <input type='hidden' name="product_id"
                                                                value="{{ $Product->product_id }}">
                                                            @php
                                                                $x;
                                                                try {
                                                                    $x = App\Models\PointOfSaleEqualSalaProduct::get()
                                                                        ->where('sala_product_id', $Product->product_id)
                                                                        ->first()->botagate_product_code;
                                                                } catch (Exception $e) {
                                                                    $x = 0;
                                                                }

                                                            @endphp
                                                            <select id="basic" class="form-control" name="ProductCode"
                                                                id="" onchange="this.form.submit()">
                                                                {{-- <input type="text" placeholder="Search.." id="myInput"
                                                                    onkeyup="filterFunction()"> --}}
                                                                @forelse ($PosProducts as $i => $Pos)
                                                                    @if ($i == 0)
                                                                        <option value="">chose product</option>
                                                                    @endif
                                                                    <option
                                                                        {{ $Pos->product_code == $x ? 'selected' : '' }}
                                                                        value="{{ $Pos->product_code }}">
                                                                        {{ $Pos->name->ar }}</option>
                                                                @empty
                                                                    <option value="">please File your Product </option>
                                                                @endempty
                                                        </select>

                                                    </form>
                                                </div>

                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1">
                                                        <option>1</option>
                                                        <option>2</option>
                                                        <option>3</option>
                                                        <option>4</option>
                                                        <option>5</option>
                                                    </select>
                                                </div>
                                            </td>
                                            <td><button type="button" class="btn btn-primary">Save</button></td>

                                        </tr>
                                    @empty
                                        <tr>
                                            <td> jksa altifani</td>
                                        </tr>

                                    @endforelse

                                    {{-- <td>
                                        @if ($Product->is_available == 1)
                                        avalible
                                        @else
                                        not available
                                        @endif
                                    </td> --}}
                                    {{-- </tr>
                                    @empty
                                    <tr>
                                        <td> jksa altifani</td>
                                    </tr> --}}

                                </tbody>
                                <tfoot>
                                    <tr>
                                        {{-- <th>id</th> --}}
                                        <th>image</th>
                                        <th>name</th>
                                        <th>price</th>
                                        {{-- <th>type</th> --}}
                                        {{-- <th>stauts</th> --}}
                                        <th>botagate Product</th>
                                        <th>quantity</th>
                                        <th>option</th>

                                        {{-- <th>avilable</th> --}}
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="text-center p-4">
                            {{ $Products->links() }}
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>




</main>
@endsection
@section('scripts')
@endsection
