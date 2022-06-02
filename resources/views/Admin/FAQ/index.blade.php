@extends('Admin.app')
@section('BreadCrumbs', 'Frequently Asked Questions')
@section('title', 'Dashboard')
@section('content')
    <!DOCTYPE html>
    <html lang="en">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('style.css') }}">
    {{-- <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport"> --}}
    <link href="<a href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" target="_blank"
        rel="noreferrer noopener" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


    <body>
        <section class="main-content">
            <div class="container">
                <div class="row flex-center">
                    <div class="col-sm-10 offset-sm-2">
                        <div class="accordion" id="accordionExample">

                            @foreach ($faq as $i => $item)
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne{{ $item->id }}">
                                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                            data-bs-target="#collapseOne{{ $item->id }}" aria-expanded="true"
                                            aria-controls="collapseOne{{ $item->id }}">
                                            <div class="circle-icon"> <i class="fa fa-question "></i> </div>
                                            <span>{{ $item->question }}</span>
                                        </button>
                                    </h2>
                                    <div id="collapseOne{{ $item->id }}" class="accordion-collapse collapse "
                                        aria-labelledby="headingOne{{ $item->id }}" data-bs-parent="#accordionExample">
                                        <div class="accordion-body"> <strong>{!! $item->answer !!} </strong>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <br>
                        <div style="display:flex; justify-content: center">


                            {{ $faq->links() }}
                        </div>
                    </div>

                </div>

            </div>
        </section>
        <script src="<a href=" https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" target="_blank"
                rel="noreferrer noopener">
            https
                : //cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js</a>" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
    </body>
    <style>
        .main-content {
            padding-top: 51px;
            padding-right: 100;
            padding-bottom: 100px;
        }

    </style>

    </html>
@endsection
