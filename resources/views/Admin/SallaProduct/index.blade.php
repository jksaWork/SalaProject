@extends('Admin.app')
@section('BreadCrumbs', 'Salla Proudct')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Salla Proudct</h6>



                            <form action="{{ route('search') }}" method="Post">
                                @csrf
                                <div>
                                    <div class="input-group rounded ">
                                        <input type="search" class="form-control rounded" placeholder="Search" name="search"
                                            aria-label="Search" aria-describedby="search-addon" />
                                        <span class="input-group-text border-0" id="search-addon">

                                            <button class="gg-search"></button>
                                        </span>
                                    </div>
                                </div>

                            </form>



                            <a href="{{ route('refresh.product') }}"
                                class="btn btn-sm btn-outline-primary align-self-center ">
                                <svg style="width:20px;height:20px" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M18 14.5C19.1 14.5 20.1 14.9 20.8 15.7L22 14.5V18.5H18L19.8 16.7C19.3 16.3 18.7 16 18 16C16.6 16 15.5 17.1 15.5 18.5S16.6 21 18 21C18.8 21 19.5 20.6 20 20H21.7C21.1 21.5 19.7 22.5 18 22.5C15.8 22.5 14 20.7 14 18.5S15.8 14.5 18 14.5M11.5 18.5C11.5 17.4 11.8 16.4 12.2 15.5H12C10.1 15.5 8.5 13.9 8.5 12S10.1 8.5 12 8.5 15.5 10.1 15.5 12C15.5 12.2 15.5 12.4 15.4 12.5C16.2 12.2 17 12 18 12C18.5 12 19 12.1 19.5 12.2V12C19.5 11.7 19.5 11.3 19.4 11L21.5 9.4C21.7 9.2 21.7 9 21.6 8.8L19.6 5.3C19.5 5 19.3 5 19 5L16.5 6C16 5.6 15.4 5.3 14.8 5L14.4 2.3C14.5 2.2 14.2 2 14 2H10C9.8 2 9.5 2.2 9.5 2.4L9.1 5.1C8.5 5.3 8 5.7 7.4 6L5 5C4.7 5 4.5 5 4.3 5.3L2.3 8.8C2.2 9 2.3 9.2 2.5 9.4L4.6 11C4.6 11.3 4.5 11.7 4.5 12S4.5 12.7 4.6 13L2.5 14.7C2.3 14.9 2.3 15.1 2.4 15.3L4.4 18.8C4.5 19 4.7 19 5 19L7.5 18C8 18.4 8.6 18.7 9.2 19L9.6 21.7C9.6 21.9 9.8 22.1 10.1 22.1H12.6C11.9 21 11.5 19.8 11.5 18.5Z" />
                                </svg>
                                update Products
                            </a>
                        </div>

                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>Image</td>
                                        <td>Name</td>
                                        <td> Price </td>
                                        <td> Product Id </td>
                                        <td>Qantity</td>
                                        <td>Action</td>
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
                                                        {{-- <select class="form-control" name="ProductCode" id=""
                                                            onchange="this.form.submit()">   {{-- <select class="form-control" name="ProductCode" id=""
                                                            onchange="this.form.submit()"> --}}
                                                        {{-- <input type="text" placeholder="Search.." id="myInput"
                                                                onkeyup="filterFunction()"> --}}
                                                        {{-- @forelse ($PosProducts as $i => $Pos)
                                                                @if ($i == 0)
                                                                    <option value="">chose product</option>
                                                                @endif
                                                                <option {{ $Pos->product_code == $x ? 'selected' : '' }}
                                                                    value="{{ $Pos->product_code }}">
                                                                    {{ $Pos->name->ar }}</option>
                                                            @empty
                                                                <option value="">please File your Product </option>
                                                            @endempty
                                                    </select> --}}

                                                    </form>
                                                </div>
                                                {{ $Product->product_id }}
                                            </td>

                                            <td>
                                                {{ $Product->quantity }}
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
                                    <td>Image</td>
                                    <td>Name</td>
                                    <td> Price </td>
                                    <td> Product Id </td>
                                    <td>Qantity</td>
                                    <td>Action</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    {{-- {!! $Clients->links() !!} --}}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>


@endsection
