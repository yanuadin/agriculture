@extends('layouts.master_backend')
@section('title', 'Konco Tani - Super Admin (Order Monitoring)')
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md">
                            <h3>Order Monitoring</h3>
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemesanan</th>
                            <th>Pembeli</th>
                            <th>Barang</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Bukti Pembayaran</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i = 1?>
                        @foreach($order_items as $order_item)
                            <tr>
                                <td>{{ $i++ }}</td>
                                <td>{{ $order_item->code }}</td>
                                <td>{{ $order_item->customerInOrder->name }}</td>
                                <td>
                                    @foreach($order_item->item as $item)
                                        <p class="mb-0"><b>{{ $item->item->name }}</b></p>
                                        <ul>
                                            <li>Jumlah : {{ $item->qty }}</li>
                                            <li>Harga : Rp. {{ number_format($item->price,2) }}</li>
                                        </ul>
                                    @endforeach
                                </td>
                                <td>{{ $order_item->totalPrice }}</td>
                                @if($order_item->status == "Approve")
                                    <td class="text-success">{{ $order_item->status }}</td>
                                @elseif($order_item->status == "Reject")
                                    <td class="text-danger">{{ $order_item->status }}</td>
                                @else
                                    <td>{{ $order_item->status }}</td>
                                @endif

                                @if($order_item->struct_payment == null)
                                    <td class="text-danger">Belum Membayar</td>
                                @else
                                    <td><img src="{{ Storage::url($order_item->struct_payment) }}" alt="" style="width: 200px; height: 175px"></td>
                                @endif
                                <td class="project-actions text-right">
                                    <a class="btn btn-success btn-sm" href="#" data-toggle="modal" data-target="#modal-approve-{{$order_item->id}}">
                                        <i class="fas fa-check-circle mr-1">
                                        </i>
                                        Approve
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="#" data-toggle="modal" data-target="#modal-reject-{{$order_item->id}}">
                                        <i class="fas fa-times-circle mr-1">
                                        </i>
                                        Reject
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Approve -->
                            <div class="modal fade" id="modal-approve-{{$order_item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menyetujui?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <form action="{{ route('super-admin.order-monitoring-store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="Approve">
                                                <input type="hidden" name="id" value="{{ $order_item->id }}">
                                                <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>

                            <!-- Modal Approve -->
                            <div class="modal fade" id="modal-reject-{{$order_item->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <p>Apakah anda yakin untuk menolak?</p>
                                        </div>
                                        <div class="modal-footer justify-content-between">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <form action="{{ route('super-admin.order-monitoring-store') }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="status" value="Reject">
                                                <input type="hidden" name="id" value="{{ $order_item->id }}">
                                                <button type="submit" class="btn btn-primary">Lanjutkan</button>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
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
