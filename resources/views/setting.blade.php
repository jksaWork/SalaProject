@extends('Admin.app')
@section('BreadCrumbs', 'Settings')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-capitalize col-4">Settings </h6>
                    </div>
                    <div class="card-body">
                        <form action="{{route('SaveSetting')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Botagaty User Name</label>
                                      <input type="text"
                                      value="{{auth()->user()->pos_email}}"
                                        class="form-control" name="BotagatyUserName" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="">Botagaty Secret Key</label>
                                      <input type="text"
                                        class="form-control" value="{{auth()->user()->pos_secret}}" name="BotagatySecretKey" id="" aria-describedby="helpId" placeholder="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div>
                                        <button class="btn btn-primary mt-2" type="submit">
                                            Update Setting
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}
@endsection
