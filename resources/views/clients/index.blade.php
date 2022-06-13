@extends('Admin.app')
@section('BreadCrumbs', 'Client Mangement')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Client Table</h6>
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>merchant id </td>
                                        <td>client name </td>
                                        <td>email  </td>
                                        <td>token Expired Data</td>
                                        <td>option</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Clients as $Client)
                                        <tr>
                                            <td>{{$Client->id}}</td>
                                            <td>{{$Client->merchant_id}}</td>

                                            <td>{{$Client->name}}</td>
                                            <td>{{$Client->email}}</td>
                                            <td> {{$Client->ExpiredDate2}} </td>
                                            <td>
                                                <form action="{{route('client.destroy' , $Client->id)}}" method="post">
                                                @csrf
                                                @method("DELETE")
                                                <button class="btn btn-sm btn-outline-danger">
                                                    <i class="bi bi-trash2"></i>
                                                </button>
                                                </form>
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
                                    <tr>
                                        <td>id</td>
                                        <td>merchant id </td>
                                        <td>client name </td>
                                        <td>email  </td>
                                        <td>token Expired Data</td>
                                        <td>option</td>
                                    </tr>
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
