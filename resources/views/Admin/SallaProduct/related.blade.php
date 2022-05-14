@extends('Admin.app')
@section('BreadCrumbs', 'Linked Product')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Linked Proudct</h6>
                        <a href="{{route('link.product')}}" class="btn btn-sm btn-outline-primary">
                            links Products
                        </a>
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>sala Product Image </td>
                                        <td>sala Product </td>
                                        <td>Point of Sala Product  </td>
                                        <td>Purches Quantity   </td>
                                        <td>option</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Products as $Product)
                                        <tr>
                                            <td>{{ $Product->id }}</td>
                                            <td><img src="{{$Product['sala_product_image']}}" width="50px" height="50px" alt=""></td>
                                            </td>
                                            <td>{{ $Product['sala_product_name'] ?? ' ' }}</td>
                                            <td>{{ $Product['botagaty_product_name']->ar ?? ' ' }}</td>
                                            <td>{{ $Product->quantitiy }} </td>
                                            <td>
                                                <a href="{{route('DeletedRelatedProduct', $Product->id)}}" type="button" class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash2"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center p-2">No Data To Show</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                        <td>id</td>
                                        <td>sala Product Image </td>
                                        <td>sala Product </td>
                                        <td>Point of Sala Product  </td>
                                        <td>Purches Quantity  </td>
                                        <td>option</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
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
