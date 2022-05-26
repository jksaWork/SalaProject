@extends('Admin.app')
@section('BreadCrumbs', __("translation.Technical_Support"));
    @section('content')
    <div class="container-fluid py-4">
        <div class="row mt-4">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="card z-index-2 h-100">
                    <div class="card-header pb-0 pt-3 bg-transparent">
                        <div class="d-flex justify-content-between">
                            <h6 class="text-capitalize col-4"> {{__('translation.ticket_table')}} </h6>
                            @if (IsClient())
                            <span><a href="{{ route('ticket.create')}}"
                                class="btn btn-primary btn-sm" {{-- --}}
                                type="button">{{__('translation.new_ticket')}}</a></span>
                            @endif
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
                                            <td>{{$data->updated_at}}</td>
                                            <td>
                                                <a href="{{IsClient() ? route('ShowMssages' , $data->id) : route('admin.ShowMssages' , $data->id)}}" class="btn btn-sm btn-outline-primary">
                                                View
                                                </a>
                                            </td>
                                        </tr>
                                        {{--
                                    </tbody> --}}
                                    @empty
                                    <tr>
                                    <td colspan='12'> {{ __('translation.no_titket')}}</td>
                                    </tr>
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
                                <div class='d-flex justify-content-center'>
                                    {{ $allTicket->links()}}
                                </div>
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
