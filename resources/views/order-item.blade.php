@extends('layouts.master')
@section('title', 'Konco Tani - Pesanan')
@section('content')
    <!-- shop-banner-area start -->
    <section class="shop-banner-area pt-120 pb-120">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md">
                                    <h3>Daftar Keranjang</h3>
                                </div>
                                <div class="col-md">
                                    @if(Auth::user())
                                        @if($order_item->struct_payment == null)
                                            <button type="button" class="btn btn-default float-right"
                                                    data-toggle="modal" data-target="#modal-payment">
                                                <i class="fas fa-paperclip"></i> Unggah Bukti Pembayaran
                                            </button>
                                        @else
                                            <small class="text-success float-right">Anda sudah mengunggah bukti pembayaran, terima kasih</small>
                                        @endif
                                    @else
                                        <small class="text-danger float-right">Anda belum mengunggah bukti pembayaran, silahkan
                                            <a href="{{ route('login.form') }}">login</a> terlebih dahulu</small>
                                    @endif

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-payment" enctype="multipart/form-data">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('order-item-store', $order_item->code) }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Bukti Pembayaran</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputFile"><b>Scan / Foto Bukti Pembayaran</b></label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" id="exampleInputFile" name="file">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                            <small class="text-danger">{{ $errors->first('file') }}</small>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal" style="padding: 7px 15px">Kembali</button>
                                                        <button type="submit" class="btn btn-primary"
                                                                style="padding: 7px 15px">Upload</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga @pcs</th>
                                    <th>Diskon @pcs</th>
                                    <th>Sub total @pcs</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach($order_item->item as $item)
                                        <tr>
                                            <td><img src="{{ Storage::url($item->item->image1) }}" alt="" style="width: 200px; height: 175px"></td>
                                            <td>{{ $item->item->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td>Rp. {{ number_format($item->item->price, 2) }}</td>
                                            @if($item->item->discount)
                                                @if($item->item->unit == "Harga")
                                                    <td>Rp. {{ number_format($item->item->discount, 2) }}</td>
                                                    <td>Rp. {{ number_format($item->item->price - $item->item->discount, 2) }}</td>
                                                @else
                                                    <td>Rp. {{ number_format($item->item->price * $item->item->discount / 100, 2) }}</td>
                                                    <td>Rp. {{ number_format($item->item->price - ($item->item->price * $item->item->discount / 100), 2) }}</td>
                                                @endif
                                            @else
                                                <td>Rp. {{ number_format(0, 2) }}</td>
                                                <td>Rp. {{ number_format($item->item->price, 2) }}</td>
                                            @endif
                                            <td>Rp. {{ number_format($item->price, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop-banner-area end -->
@endsection
