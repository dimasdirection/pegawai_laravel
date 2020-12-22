@extends('admin')

@section('main')

<div class="row">
    <div class="row">
        <form action="{{ url("/api/admins") }}" method="GET" class="form-inline">
            <div class="form-group mx-sm-3 mb-2">
                <input value="{{ Request::get('keyword') }}" name="keyword" type="text" class="form-control"
                    placeholder="by Name">
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
                        <th colspan="2">Action</>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($admins as $admin)
                    <tr>
                        <td>{{$admin->id_admin}}</td>
                        <td>{{$admin->nama_depan}}</td>
                        <td>{{$admin->nama_belakang}}</td>
                        <td>{{$admin->email}}</td>
                        <td>{{$admin->password}}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ url("admins/{$admin->id_admin}/edit") }}">EDIT</a>
                        </td>
                        <td>
                            <form action="{{ url("admin/{$admin->id_admin}") }}" method="post">
                                @csrf
                                @method("DELETE")
                                <button class="btn btn-danger">DELETE</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>


@endsection
