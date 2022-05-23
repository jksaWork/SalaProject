@extends('Admin.app')
@section('content')
    <table class="table table-striped table-inverse table-responsive">
        <tbody>
            <tr>
                <td>user id</td>
                <td> {{$id}} </td>
            </tr>
            <tr>
                <td>user</td>
                <td> {{$user}} </td>
            </tr>
            <tr>
                <td>message</td>
                <td> {{$ex->getMessage()}} </td>
            </tr>
            <tr>
                <td>file</td>
                <td> {{$ex->getFile()}} </td>
            </tr>
            <tr>
                <td>line</td>
                <td>{{$ex->getLine()}}</td>
            </tr>
        </tbody>
</table>
<hr>
exception all Exception {{$ex}}
@endsection
