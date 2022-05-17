@extends('Admin.app')
@section('BreadCrumbs', 'Technical Support');
    @section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4"> Tickts Table </h6>
                            <span><a href="{{ route('ticket.create')}}"
                                    class="btn btn-primary btn-sm" {{-- --}}
                                    type="button">New Ticket</a></span>
                        </div>
                        <div class="table-responsive mt-5">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered ">
                                    <thead>
                                        <tr>
                                            <td>{{__('translation.no')}}</td>
                                            <td>{{__('translation.subject')}}</td>
                                            <td>{{__('translation.topic')}}</td>
                                            {{-- <td>{{__('translation.sender')}}</td> --}}
                                            <td>{{__('translation.status')}}</td>
                                            <td>{{__('translation.date')}}</td>
                                            <td>{{__('translation.action')}}</td>
                                        </tr>
                                    </thead>
                                    {{-- @dd('jksa') --}}
                                    <tbody>
                                        @forelse ($allTicket as $i => $data )
                                        <tr>
                                            <td>{{$i + 1}}</td>
                                            <td>{{$data->subject}}</td>
                                            <td>{{($data->Topic->topicname) ?? ' - '}}</td>
                                            {{-- <td>{{($data->clie->name) ?? ' - '}}</td> --}}
                                            <td>{{__('translation.' . $data->status);}}</td>
                                            <td>{{$data->created_at}}</td>
                                            <td>
                                                <a href="{{IsClient() ? route('ShowMssages' , $data->id) : route('admin.ShowMssages' , $data->id)}}" class="btn btn-sm btn-outline-primary">
                                                View
                                                </a>
                                            </td>
                                        </tr>
                                        {{--
                                    </tbody> --}}
                                    @empty
                                    <p>No users</p>
                                    @endforelse
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>{{ __('translation.No') }}</th>
                                            <th>{{ __('translation.subject') }}</th>
                                            <th>{{ __('translation.topic') }}</th>
                                            {{-- <th>{{__('translation.area')}}</th> --}}
                                            {{-- <th>{{ __('translation.sender') }}</th> --}}
                                            <th>{{ __('translation.status') }}</th>
                                            <th>{{ __('translation.date') }}</th>
                                            <th>{{ __('translation.action') }}</th>
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
    {{-- @dd('jska altinga'); --}}
    </div>
    @endsection
