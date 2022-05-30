@extends('Admin.app')
@section('BreadCrumbs', 'Frequently Asked Questions')
@section('title', 'Dashboard')
@section('content')
    <br>
    <br>
    <div class="card">
        <div class="card-body px-3 py-4-5">
            <div class="row">
                <div>
                    <form action="{{ route('FAQ.store') }}" method="POST" style=" margin-left : 25%;width:75%; ">
                        @csrf
                        <div class=" col-md-12 col-lg-7 justify-content-center">

                            <label>Add Question</label>
                            <div class="form-group ">
                                <div class="form-floating mb-3">
                                    <input name="question" type="question" class="form-control" id="floatingInput"
                                        placeholder="Question">

                                </div>
                                <label placeholder="Add your Question here" for="floatingInput">Answer</label>
                                <textarea name="content" id="editor" placeholder="Question" autofocus></textarea>


                            </div>
                            <button type="submit" class="btn btn-primary ">Add</button>
                        </div>
                </div>

                <div style="margin-top:2rem ;">


                    <form action="{{ route('FAQ.index') }}" method="get">
                        <div style=" margin-left : 10%">
                            <br>
                            <br>
                            <br>
                            <h6>Qestion Table Mange</h6>
                        </div>

                        <table class="  table table-bordered table-striped table-highlight"
                            style="text-align: center; margin-left : 10%;  width:60vw ;border:solid 1.5px">

                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Question</th>
                                    <th scope="col">Answer</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($questions as $item)
                                    <tr>
                                        <th scope="row">{{ $item->id }}</th>
                                        <td>{{ $item->question }}</td>
                                        <td>{!! $item->answer !!}</td>
                                        <td>

                                            <div class="d-flex d-inline">
                                                <button type="button" class="btn btn-success">Show</button>
                                                &nbsp;&nbsp;
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                    data-bs-whatever="@mdo" class="btn btn-info">Edit</button>
                                                &nbsp;&nbsp;
                                                <div class="modal fade" id="exampleModal" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">New
                                                                    message
                                                                </h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="" action="">
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Question
                                                                            :</label>
                                                                        <input type="text" class="form-control"
                                                                            id="recipient-name">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label for="recipient-name"
                                                                            class="col-form-label">Answer
                                                                            :</label>
                                                                        <input type="text" class="form-control"
                                                                            id="recipient-name">
                                                                    </div>


                                                                </form>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Update</button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <form method="POST" action="{{ route('FAQ.destroy', ['id' => $item->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button value="delete" name="_method" type="submit" class="btn btn-danger">
                                        onclick="var result = confirm('Are you sure you want to delete this record?');if(result){event.preventDefault();document.getElementById('delete-form-{{ $item->id }}').submit(); }">
                                        Delete</button>
                                </form> --}}
                                                <form method="POST" action="{{ route('FAQ.destroy', $item->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger">
                                                        Delete
                                                    </button>
                                            </div>
                    </form>
                    </td>

                    </tr>
                    @endforeach




                    </tbody>
                    <footer>
                        <th scope="col">Id</th>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Action</th>
                    </footer>
                    </table>
                    <div class="d-flex justify-content-center">{{ $questions->links() }}</div>
                    </form>
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
    </div>
    <style>
        .btn {
            height: fit-content;
        }

    </style>

@endsection
