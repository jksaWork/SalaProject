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
                                    <a href="{{route('refresh.product')}}" class="btn btn-sm btn-outline-primary">
                                        <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M18 14.5C19.1 14.5 20.1 14.9 20.8 15.7L22 14.5V18.5H18L19.8 16.7C19.3 16.3 18.7 16 18 16C16.6 16 15.5 17.1 15.5 18.5S16.6 21 18 21C18.8 21 19.5 20.6 20 20H21.7C21.1 21.5 19.7 22.5 18 22.5C15.8 22.5 14 20.7 14 18.5S15.8 14.5 18 14.5M11.5 18.5C11.5 17.4 11.8 16.4 12.2 15.5H12C10.1 15.5 8.5 13.9 8.5 12S10.1 8.5 12 8.5 15.5 10.1 15.5 12C15.5 12.2 15.5 12.4 15.4 12.5C16.2 12.2 17 12 18 12C18.5 12 19 12.1 19.5 12.2V12C19.5 11.7 19.5 11.3 19.4 11L21.5 9.4C21.7 9.2 21.7 9 21.6 8.8L19.6 5.3C19.5 5 19.3 5 19 5L16.5 6C16 5.6 15.4 5.3 14.8 5L14.4 2.3C14.5 2.2 14.2 2 14 2H10C9.8 2 9.5 2.2 9.5 2.4L9.1 5.1C8.5 5.3 8 5.7 7.4 6L5 5C4.7 5 4.5 5 4.3 5.3L2.3 8.8C2.2 9 2.3 9.2 2.5 9.4L4.6 11C4.6 11.3 4.5 11.7 4.5 12S4.5 12.7 4.6 13L2.5 14.7C2.3 14.9 2.3 15.1 2.4 15.3L4.4 18.8C4.5 19 4.7 19 5 19L7.5 18C8 18.4 8.6 18.7 9.2 19L9.6 21.7C9.6 21.9 9.8 22.1 10.1 22.1H12.6C11.9 21 11.5 19.8 11.5 18.5Z" />
                                        </svg>
                                        Products
                                    </a>
                                    <a href="{{route('refresh.pos.product')}}" class="btn btn-sm btn-outline-primary">
                                        <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                            <path fill="currentColor" d="M18 14.5C19.1 14.5 20.1 14.9 20.8 15.7L22 14.5V18.5H18L19.8 16.7C19.3 16.3 18.7 16 18 16C16.6 16 15.5 17.1 15.5 18.5S16.6 21 18 21C18.8 21 19.5 20.6 20 20H21.7C21.1 21.5 19.7 22.5 18 22.5C15.8 22.5 14 20.7 14 18.5S15.8 14.5 18 14.5M11.5 18.5C11.5 17.4 11.8 16.4 12.2 15.5H12C10.1 15.5 8.5 13.9 8.5 12S10.1 8.5 12 8.5 15.5 10.1 15.5 12C15.5 12.2 15.5 12.4 15.4 12.5C16.2 12.2 17 12 18 12C18.5 12 19 12.1 19.5 12.2V12C19.5 11.7 19.5 11.3 19.4 11L21.5 9.4C21.7 9.2 21.7 9 21.6 8.8L19.6 5.3C19.5 5 19.3 5 19 5L16.5 6C16 5.6 15.4 5.3 14.8 5L14.4 2.3C14.5 2.2 14.2 2 14 2H10C9.8 2 9.5 2.2 9.5 2.4L9.1 5.1C8.5 5.3 8 5.7 7.4 6L5 5C4.7 5 4.5 5 4.3 5.3L2.3 8.8C2.2 9 2.3 9.2 2.5 9.4L4.6 11C4.6 11.3 4.5 11.7 4.5 12S4.5 12.7 4.6 13L2.5 14.7C2.3 14.9 2.3 15.1 2.4 15.3L4.4 18.8C4.5 19 4.7 19 5 19L7.5 18C8 18.4 8.6 18.7 9.2 19L9.6 21.7C9.6 21.9 9.8 22.1 10.1 22.1H12.6C11.9 21 11.5 19.8 11.5 18.5Z" />
                                        </svg>
                                        Botagaty Product
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive">

                                <table class="table table-striped table-inverse " style="max-width: 100%">
                                    <thead class="thead-inverse">
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Price</th>
                                            {{-- <th>type</th> --}}
                                            {{-- <th>stauts</th> --}}
                                            <th>Cards Type</th>
                                            <th>Quantity</th>
                                            <th>Option</th>
                                        </tr>
                                    </thead>

                                    <br>

                                    <tr>

                                        <div>
                                            <div class=" p-2 bd-highlight col-md-5">
                                                <form action="{{ route('search') }}" method="post">
                                                    @csrf
                                                    <label for="">
                                                        <h3 class="font-weight-bold">Search</h3>
                                                    </label>
                                                    <div class="d-inline"> <input name="search" type="text"
                                                            class="d-flex justify-content-end form-control"
                                                            onchange="this.form.submit()">
                                                        <button type="button" class="btn btn-primary">Save</button>

                                                    </div>
                                                </form>


                                            </div>

                                        </div>

                                    </tr>



                                    <br>
                                    <br>
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
                                                            <select  class="form-control" name="ProductCode"
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
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center p-2">No Data To Show</div>
                                            </td>
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Price</th>
                                        {{-- <th>type</th> --}}
                                        {{-- <th>stauts</th> --}}
                                        <th>Card Type</th>
                                        <th>Quantity</th>
                                        <th>Option</th>

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
