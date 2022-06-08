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
                            <form action="{{ route('admin.store.orgnazition.profile') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="d-flex justify-content-center">
                                    <img src="{{ $OrganizationProfile->logo }}" alt="" width="150" height="150">
                                </div>
                                <div class="row m-2">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">App Name</label>
                                            <input type="text" value="{{ $OrganizationProfile->name }}"
                                                class="form-control" name="name" id="" aria-describedby="helpId"
                                                placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">logo</label>
                                            <input type="file" class="form-control" name="logo" id=""
                                                aria-describedby="helpId" placeholder="">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div>
                                            <button class="btn btn-sm btn-outline-primary mt-2" type="submit">
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
