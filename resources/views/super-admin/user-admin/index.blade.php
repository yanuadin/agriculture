@extends('layouts.master_backend')
@section('title', 'Konco Tani - Super Admin (User:Admin)')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            <h3>User Admin</h3>
                        </div>
                        <div class="col-md text-right">
                            <a href="#" class="btn btn-primary">Tambah Admin</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No HP</th>
                            <th>Nama Toko</th>
                            <th>Email</th>
                            <th>Password</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->address }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->store_name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->default_password }}</td>
                                <td class="project-actions text-right">
                                    <a class="btn btn-info btn-sm" href="#">
                                        <i class="fas fa-pencil-alt mr-1">
                                        </i>
                                        View & Edit
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#">
                                        <i class="fas fa-trash mr-1">
                                        </i>
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <!-- Data Table Scripts -->
    <script>
        $(function () {
            $("#table1").DataTable();
        });
    </script>
@endsection
