@extends('Admin.app')
@section('BreadCrumbs', 'Messages');
@section('content')
<div class="content-wrapper">
    <div class="container-fluid py-4">
        <div class="row mt-1">
            <div class="col-lg-12 mb-lg-0 mb-4">
                <div class="content-header-right text-md-right col-md-6 col-12">
                </div>
            </div>
            <div class="content-body">
                <!-- Zero configuration table -->
                <section id="configuration">
                    <div class="row">
                        <div class="col-md-4">
                                <div class="card">
                                    <div class="pt-4 px-3">
                                    <h6>Tickets</h6>
                                        @php
                                            $StatusArrays = [
                                                'pending' => 'bg-info',
                                                'inprogress' => 'bg-light text-black',
                                                ];
                                        @endphp
                                    @forelse ($tickets as $ticket )
                                    <div class="p-1">
                                        <div class="d-flex justify-content-between">
                                            <div class="">
                                                <a
                                                {{-- style="color:r" --}}
                                                class="text-black"
                                                href="{{IsClient() ? route('ShowMssages' ,$ticket->id ) : route('admin.ShowMssages' ,$ticket->id) }}">
                                                    <span>
                                                        {{$ticket->subject}}
                                                    </span>
                                                </a>
                                            </div>
                                            <span class="badge {{ $StatusArrays[$ticket->status]}}">
                                                {{$ticket->status}}
                                            </span>
                                        </div>
                                        <div class="" style="border-bottom:1px solid #ccc; margin: 10px 0 "></div>
                                     </div>
                                    @empty
                                    <div class="p-1">
                                        <div class="d-flex justify-content-center">
                                            NO tickets right now
                                        </div>
                                        <div class="" style="border-bottom:1px solid #ccc; margin: 10px 0 "></div>
                                        </div>
                                    @endforelse
                                    </div>
                            </div>
                        </div>
                        <div class="col-8 p-0 m-0">
                            <div class="card">
                                <div class="card" style='max-height:500px;overflow-y:scroll' id="ScrolToDown">
                                    <div class="card-header">
                                        <a class="heading-elements-toggle"><i
                                                class="la la-ellipsis-v font-medium-3"></i></a>
                                        <div class="heading-elements">
                                            <ul class="list-inline mb-0">
                                                <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                                <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                                <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard" style='min-height:300px'>
                                            <div class="">
                                                @php
                                                $isFirest = true
                                                @endphp
                                                @foreach ($data->Messages as $ticketmassege)
                                                @if( $isFirest || date('Y-m-d',strtotime($ticketmassege->created_at)) !=
                                                $perDate )
                                                <div class="d-flex justify-content-center ">
                                                    <span
                                                        class="padge bg-sm bg-info text-white py-1 px-2 btn-rounded"
                                                        style="border-radius: 30px">
                                                        {{date('Y-m-d',strtotime($ticketmassege->created_at))}}
                                                        @php
                                                        $perDate=date('Y-m-d',strtotime($ticketmassege->created_at));
                                                        $isFirest = false;
                                                        @endphp
                                                    </span>
                                                </div>
                                                @endif
                                                {{-- @if($data->sender ==$ticketmassege->sender) --}}
                                                <div class="d-flex justify-content-{{($data->sender == $ticketmassege->sender)?"
                                                    start":"end"}} ">
                                                <span class=" {{ $data->sender == $ticketmassege->sender ? "bg-light
                                                    text-black" : 'bg-primary text-white'}} m-2 py-1 px-3 btn-rounded"
                                                    style="border-radius: 10px">
                                                    {{$ticketmassege->content}} &nbsp;&nbsp; <sub> {{ date('h:i
                                                        A',strtotime($ticketmassege->created_at)) }}</sub>
                                                    </span>
                                                </div>
                                                @endforeach
                                                <form action="{{ IsClient() ? route('store.message' , $id) : route('admin.store.message' , $id)}}" method="post">
                                                    @csrf
                                                    @php
                                                        $ticket = \App\Models\Ticket::find($id)
                                                        ->update(['status' => 'inprogress']);
                                                    @endphp
                                                    <div class="d-flex justify-content-between mt-5 align-content-center">
                                                        <input placeholder="Type a message" name="text"
                                                        class="bg-light"
                                                    style="width:90%;height:50px;border:none;border-radius:10px"
                                                    onfocus="this.style.border = 'none'"
                                                    />

                                                    <input type="hidden" name="ticket_id" value="{{$data->id}}" />
                                                    <button type="submit"
                                                        class="btn btn-info" style="border-radius: 50%">
                                                    <span>
                                                        <svg style="width:24px;height:24px" viewBox="0 0 24 24">
                                                            <path fill="currentColor" d="M2 3V10L17 12L2 14V21L23 12M22 15.5L18.5 19L16.5 17L15 18.5L18.5 22L23.5 17Z" />
                                                        </svg>
                                                    </span>
                                                    </button>
                                                    </div>
                                                    @error('text')
                                                        <div class="text-danger">{{$message}}</div>
                                                    @enderror
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </section>
    </div>
</div>
<style>
    #ScrolToDown::-webkit-scrollbar {
  width: 5px;
}


/* Track */
#ScrolToDown::-webkit-scrollbar-track {
  background: #f1f1f1;
}

/* Handle */
#ScrolToDown::-webkit-scrollbar-thumb {
  background: #888;
}

/* Handle on hover */
#ScrolToDown::-webkit-scrollbar-thumb:hover {
  background: #555;
  width: 20px
}
</style>
<script>
    window.addEventListener('load', (event) => {
        console.log('page is fully loaded');
        WindowLoad();
        });
    function WindowLoad(){
        // alert('loaded');
        var  el = document.getElementById('ScrolToDown');
    el.scrollTo(0 , el.scrollHeight);
    }
</script>
@endsection


@push('scripts')
<script type="text/javascript">
    function deleteConfirmation(iteration) {
                swal.fire({
                    title: "{{__('translation.delete') . __('translation.?') }} ",
                    text: '{{ __('translation.do_you_want_Delete_item')}}' ,
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonText:'{{ __('translation.delete')}}',
                    cancelButtonText:'{{ __('translation.cancel')}}',
                    reverseButtons: !0
                }).then(function (e) {
                    if (e.value === true) {
                        console.log('delted');
                        $('#deleteform'+iteration).submit();
                    } else {
                        e.dismiss;
                    }
                }, function (dismiss) {
                    return false;
                })
            }
</script>
@endpush
