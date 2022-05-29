@extends('Admin.app')
@section('BreadCrumbs', 'Frequently Asked Questions')
@section('title', 'Dashboard')
@section('content')


    <br>

    <form action="" method="" style=" margin-left : 25%;width:100%; margin-top:1%">


        <div class="h-25 col-md-12 col-lg-5 justify-content-center">

            <label>Add Question</label>
            <div class="form-group ">
                <div class="form-floating mb-3">
                    <input type="question" class="form-control" id="floatingInput" placeholder="Question">

                </div>
                <label placeholder="Add your Question here" for="floatingInput">Answer</label>
                <textarea name="content" id="editor" placeholder="Question" autofocus></textarea>
                <br>

            </div>
            <button type="button" class="btn btn-primary ">Add</button>
        </div>
        </div>
        <br><br>
        <div style="margin-top:70px ;">
            <form action="">
                <caption>Qestion Table Mange</caption>
                <br><br>
                <table class="table table-bordered table-striped table-highlight"
                    style="text-align: center; margin-left : 10%;  width:60vw ;border:solid 1.5px">

                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Question</th>
                            <th scope="col">Answer</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button type="button" class="btn btn-success">Success</button>
                                <button type="button" class="btn btn-info">Info</button>
                                <button type="button" class="btn btn-danger">Danger</button>
                            </td>
                        </tr>

                    </tbody>
                    <footer>
                        <th scope="col">id</th>
                        <th scope="col">Question</th>
                        <th scope="col">Answer</th>
                        <th scope="col">Action</th>
                    </footer>
                </table>
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

    @endsection
