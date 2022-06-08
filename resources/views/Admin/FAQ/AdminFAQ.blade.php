@extends('Admin.app')
@section('BreadCrumbs', 'Frequently Asked Questions')
@section('title', 'Dashboard')
@section('content')
    <br>
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div style="display: flex; justify-content: flex-end; margin-right: 60; margin-top: 50;"> <button type="button"
                    data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@mdo"
                    class="btn btn-sm btn-outline-primary align-self-center">Add New</button>
            </div>

            <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1">
                <div class="modal-dialog" id="es">
                    <div class="modal-content">
                        <div class=" modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add New FAQ Question
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('FAQ.store') }}" method="POST" style=" margin-left : 10%;width:100%; ">
                                @csrf
                                <div class=" col-md-12 col-lg-10 justify-content-center">
                                    <label
                                        style="
                                                                                                                                                                                                                                                        display: flex;
                                                                                                                                                                                                                                                        justify-content: center;
                                                                                                                                                                                                                                                    ">Add
                                        Question</label>
                                    <br>
                                    <div class="form-group ">
                                        <div class="form-floating mb-3">
                                            <input name="question" type="question" class="form-control" id="floatingInput"
                                                placeholder="Question">
                                        </div>
                                        <label placeholder="Add your Question here" for="floatingInput"
                                            style="
                                                                                                                                                                                                                                                    display: flex;
                                                                                                                                                                                                                                                    justify-content: center;
                                                                                                                                                                                                                                                ">Answer</label>
                                        <br>
                                        <textarea name="content" id="editor" placeholder="Question" autofocus></textarea>
                                    </div>
                                    <div class="d-content">
                                        <br>
                                        <br>

                                        <div
                                            style="
                                                                                                                                                                                                                    display: flex;
                                                                                                                                                                                                                    justify-content: end;
                                                                                                                                                                                                                    margin-right: 5%;
                                                                                                                                                                                                                ">
                                            <label class="switch">
                                                <input type="checkbox" name="isActive">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>

                                    </div>
                                    <br> <br>

                                </div>
                        </div>
                        <div class="modal-footer">

                            <button type="submit" class="btn btn-primary ">Add</button>


                        </div>
                    </div>
                </div>
            </div>
            <br>

            <div class="row">
                <div>

                </div>
            </div>
            <div style="margin-top:2rem ;">
                <form action="{{ route('FAQ.index') }}" method="get">
                    <div style=" margin-left : 5%">

                        <h6>Qestion Table Mange</h6>

                        <div class="table-responsive mt-5">
                            <table class=" justify-content-center  table align-items-center table-bordered">

                                <thead>
                                    <tr class=" text-center">
                                        <th scope="col">Id</th>
                                        <th scope="col">Question</th>
                                        <th scope="col">Answer</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>

                                        @foreach ($questions as $item)
                                            <th class="text-center" scope="row">{{ $item->id }}</th>
                                            <td>{{ $item->question }}</td>
                                            <td>{!! $item->answer !!}</td>
                </form>

                <td>



                    <div class="d-flex d-inline justify-content-center">

                        <label class="switch mt-3">
                            <input type="checkbox" na>
                            <span class="slider round"></span>
                        </label> &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="button" class="btn btn-sm btn-outline-secondary align-self-center ">Update</button>
                        &nbsp;&nbsp;
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo"
                            class="btn btn-sm btn-outline-info align-self-center">Edit</button>
                        &nbsp;&nbsp;

                        <form method="POST" action="{{ route('FAQ.destroy', $item->id) }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-sm btn-outline-danger align-self-center d-flex mt-3 ">
                                Delete
                            </button>
                </td>
                </tr>

                </form>
            </div>
        </div>
    </div>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New
                        message
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('FAQ.update', $item->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="mb-3">
                            <input name="id" type="text" class="form-control" value="{{ $item->id }}">
                            <label for="recipient-name" class="col-form-label">Question
                                :</label>
                            <input name="question" type="text" class="form-control" id="recipient-name">
                        </div>
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">Answer
                                :</label>
                            <input type="text" class="form-control" name="answer" id="recipient-name">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-secondary">Update</button>

                </div>
            </div>
            @endforeach




            </tbody>
            <footer>
                <tr class=" text-center">
                    <th scope="col">Id</th>
                    <th scope="col">Question</th>
                    <th scope="col">Answer</th>
                    <th scope="col">Action</th>
                </tr>
            </footer>
            </table>
            <div class="d-flex justify-content-center">{{ $questions->links() }}</div>
            </form>
        </div>
    </div>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);

            });
    </script>

    </div>
    </div>
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        /* Hide default HTML checkbox */
        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        /* The slider */
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

        .btn {
            height: fit-content;
        }

        #es {
            max-width: 800px !important;
        }
    </style>

@endsection
