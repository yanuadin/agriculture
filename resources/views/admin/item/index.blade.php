@extends('layouts.master_backend')
@section('title', 'Konco Tani - Admin (Barang)')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            <h3>Data Barang</h3>
                        </div>
                        <div class="col-md text-right">
                            <a href="{{ route('admin.item.create') }}" class="btn btn-primary">Tambah Barang</a>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Satuan</th>
                                <th>Deskripsi</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 1?>
                            @foreach($items as $item)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->quantity }}</td>
                                    <td>{{ $item->price }}</td>
                                    <td>{{ $item->discount }}</td>
                                    <td>{{ $item->unit }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td class="project-actions text-right">
                                        <a class="btn btn-info btn-sm" href="{{ route('admin.item.edit', $item->id) }}">
                                            <i class="fas fa-pencil-alt mr-1">
                                            </i>
                                            View & Edit
                                        </a>
                                        <a class="btn btn-danger btn-sm" href="{{ route('admin.item-delete', $item->id) }}">
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
