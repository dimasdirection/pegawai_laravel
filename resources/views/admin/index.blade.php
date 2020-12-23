@extends('layouts.app')

@section('main')

<a href="" class="btn btn-success mb-1">Add New Admin</a>

@if(session()->get("success"))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ session()->get("success") }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<div class="row">
    <form action="" method="GET" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input value="{{ Request::get('keyword') }}" name="keyword" type="text" class="form-control" placeholder="by Name">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
</div>
<div class="row">
    <div class="col-md-12">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Depan</th>
                    <th>Nama Belakang</th>
                    <th>Email Admin</th>
                    <th colspan="2">Action</th>
                </tr>
            </thead>
            <tbody>

                <tr>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>test</td>
                    <td>
                    <a class="btn btn-primary" href="">EDIT</a>
                    </td>
                    <td>
                        <form action="" method="post">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger">DELETE</button>
                        </form>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>

@endsection

