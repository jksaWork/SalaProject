@extends('Admin.app')
@section('BreadCrumbs', 'User Mangement')
@section('content')
    <div class="container-fluid py-4">
        @php
            $classs = ['badge bg-light-primary' , 'badge bg-light-danger', 'badge bg-light-success' , 'badge bg-light-secondary' ,  'badge bg-light-warning', 'badge bg-light-info']
        @endphp
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
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>user name </td>
                                        <td>email </td>
                                        <td>permissions </td>
                                        <td>option</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Users as $User)
                                        <tr>
                                            <td>{{$User->id}}</td>
                                            <td>{{$User->name}}</td>
                                            <td>{{$User->email}}</td>
                                            <td>
                                                @foreach($User->Permission->roles ?? [] as $key => $role)
                                                <span class="{{$classs[$key]}}">
                                                    {{$role}}
                                                </span>
                                                @endforeach
                                            </td>
                                            <td>
                                                <form action="{{route('admin.users.destroy' , $User->id)}}" method="post">
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
                                        <td>user name</td>
                                        <td>email</td>
                                        <td>permissions </td>
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

@endsection
