@extends('Admin.app')
@section('BreadCrumbs', 'Subscription')
@section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4">Subscription table</h6>

                        </div>
                        <div class="table-responsive mt-5">
                            <table class="table align-items-center table-bordered  ">
                                <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>client </td>
                                        <td> plan name </td>
                                        <td> plan type </td>
                                        <td> start date </td>
                                        <td> end date</td>
                                        <td> price</td>
                                        <td> total</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($Subscriptions as $key => $Subscription)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $Subscription->Client->name }}</td>
                                            <td>{{ $Subscription->plan_name ?? '-' }} </td>
                                            <td>{{ $Subscription->plan_type ?? '-' }} </td>
                                            <td>{{ $Subscription->StratDateHum }}</td>
                                            <td>{{ $Subscription->EndDateHum }}</td>
                                            <td>{{ $Subscription->price }}</td>
                                            <td>{{ $Subscription->total }}</td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6">
                                                <div class="d-flex justify-content-center p-2">No Subscription To Show</div>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>id</td>
                                        <td>client </td>
                                        <td> plan name </td>
                                        <td> plan type </td>
                                        <td> start date </td>
                                        <td> end date</td>
                                        <td> price</td>
                                        <td> total</td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    {!! $Subscriptions->links() !!}
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
