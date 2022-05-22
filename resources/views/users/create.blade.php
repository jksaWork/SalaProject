@extends('Admin.app')
@section('BreadCrumbs', 'User Mangement')
@section('content')
<div class="container-fluid py-4">
    <div class="row mt-4">
        <div class="col-lg-12 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-capitalize col-4">User Mangement</h6>
                        <a href="{{route('admin.users.create')}}" class="btn btn-sm btn-outline-primary">
                            Add users
                        </a>
                    </div>
                    <div class="mt-2">
                        <form action="{{route('admin.users.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">name</label>
                                        <input type="text" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="">
                                        @error('name')
                                        <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">email</label>
                                        <input type="email" name="email" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="">
                                        @error('email')
                                        <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">password</label>
                                        <input type="password" name="password" class="form-control" name="name" id=""
                                            aria-describedby="helpId" placeholder="">
                                        @error('password')
                                        <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">permissions</label>
                                        <select name="perms[]" multiple class="form-control" name="permissions" id="">
                                            @foreach ($Permissions as $per )
                                            <option value="{{$per}}">{{$per}}</option>
                                            @endforeach
                                        </select>
                                        @error('perms')
                                            <small class="text-danger">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-sm btn-outline-primary">
                                Add
                            </button>
                            <button class="btn  btn-sm btn-outline-danger">
                                go back
                            </button>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
