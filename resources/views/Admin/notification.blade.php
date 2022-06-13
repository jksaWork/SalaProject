@extends('layouts.Admin.app')
@section('BreadCrumbs', 'Notification Report')
    {{-- @section(') --}}
    @section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="row">
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon purple">
                                    <i class="iconly-boldShow"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Profile Views</h6>
                                <h6 class="font-extrabold mb-0">112.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon blue">
                                    <i class="iconly-boldProfile"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Followers</h6>
                                <h6 class="font-extrabold mb-0">183.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon green">
                                    <i class="iconly-boldAdd-User"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Following</h6>
                                <h6 class="font-extrabold mb-0">80.000</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body px-3 py-4-5">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="stats-icon red">
                                    <i class="iconly-boldBookmark"></i>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <h6 class="text-muted font-semibold">Saved Post</h6>
                                <h6 class="font-extrabold mb-0">112</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Subscription and Package table</h6>
                            <div class="col-6"></div>
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>name</td>
                                        <td>amount</td>
                                        <td>subscription</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($NotificationsReprot as $key => $Notifications )
                                    <tr>
                                        <td>{{$Notifications->id}}</td>
                                        <td>{{$Notifications->date}}</td>
                                        <td>{{$Notifications->user_id}}</td>
                                        <td>{{$Notifications->count}}</td>
                                    </tr>
                                    <tr></tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"> No data Right Now</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <td>id</td>
                                    <td>name</td>
                                    <td>amount</td>
                                    <td>subscription</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>

    </div>

    <div class="container-fluid py-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Subscription and Package table</h6>
                            <div class="col-6"></div>
                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>name</td>
                                        <td>amount</td>
                                        <td>subscription</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Packages as $key => $Package )
                                    <tr>
                                        <td>{{$Package->id}}</td>
                                        <td>{{$Package->name}}</td>
                                        <td>{{$Package->price * $Package->subscription->count()}}</td>
                                        <td>{{$Package->subscription->count() }}</td>
                                    </tr>
                                    <tr></tr>
                                    @empty
                                    <tr>
                                        <td colspan="5"> No data Right Now</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <td>id</td>
                                    <td>name</td>
                                    <td>amount</td>
                                    <td>subscription</td>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

 
        </div>
    </div>
    </div>
    @endsection
