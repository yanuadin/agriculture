@extends('layouts.master')
@section('title', 'Konco Tani')
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
                                <div class="col-md text-right">
                                    <button type="button" class="btn btn-default"
                                       data-toggle="modal" data-target="#modal-default">
                                        <i class="fas fa-shopping-cart"></i> Bungkus
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modal-default">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <form action="{{ route('buy-items') }}" method="POST">
                                                    @csrf
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Daftar Belanja</h4>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="card">
                                                            <!-- /.card-header -->
                                                            <div class="card-body p-0">
                                                                <table class="table table-condensed">
                                                                    <tbody>
                                                                    @if(Session::has('cart'))
                                                                        @foreach(Session::get('cart')->items as $item)
                                                                            <tr>
                                                                                <td class="text-left">{{ $item['item']->name }}
                                                                                    <br>{{ $item['qty'] }} x
                                                                                    @if($item['item']->discount)
                                                                                        @if($item['item']->unit == "Harga")
                                                                                            {{ $item['item']->price - $item['item']->discount }}
                                                                                        @else
                                                                                            {{ $item['item']->price - ($item['item']->price * $item['item']->discount / 100) }}
                                                                                        @endif
                                                                                    @else
                                                                                        {{ $item['item']->price }}
                                                                                    @endif
                                                                                </td>
                                                                                <td>Rp. {{ number_format($item['price'], 2) }}</td>
                                                                            </tr>
                                                                        @endforeach
                                                                        <tr>
                                                                            <td class="text-left"><b>Total</b></td>
                                                                            <td><b>Rp. {{ number_format(Session::get('cart')->totalPrice, 2) }}</b></td>
                                                                        </tr>
                                                                    @else
                                                                        <tr>
                                                                            <td>-</td>
                                                                            <td>-</td>
                                                                        </tr>
                                                                    @endif
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <!-- /.card-body -->
                                                        </div>
                                                        <!-- /.card -->
                                                        <small class="text-danger">Pembayaran dilakukan melalui rekening <b>34294320200</b> (BC*)</small>
                                                        <br>
                                                        <small class="text-danger">Pembayaran paling lambat satu minggu setelah menekan tombol "Bungkus"</small>
                                                        <br>
                                                        <div class="icheck-primary">
                                                            <input type="checkbox" id="agree" name="agree" required>
                                                            <label for="agree">
                                                                <b>Saya menyetujui ketentuan diatas</b>
                                                            </label>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer justify-content-between">
                                                        <button type="button" class="btn btn-default"
                                                                data-dismiss="modal" style="padding: 7px 15px">Kembali</button>
                                                        <button type="submit" class="btn btn-primary"
                                                                style="padding: 7px 15px">Bungkus</button>
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
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga @pcs</th>
                                    <th>Diskon @pcs</th>
                                    <th>Sub total</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                    @if(Session::has('cart'))
                                        <?php $i = 1 ?>
                                        @foreach(Session::get('cart')->items as $item)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td><img src="{{ Storage::url($item['item']->image1) }}" alt="" style="width: 200px; height: 175px"></td>
                                                <td>{{ $item['item']->name }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>Rp. {{ number_format($item['item']->price, 2) }}</td>
                                                @if($item['item']->discount)
                                                    @if($item['item']->unit == "Harga")
                                                        <td>Rp. {{ number_format($item['item']->discount, 2) }}</td>
                                                    @else
                                                        <td>Rp. {{ number_format($item['item']->price * $item['item']->discount / 100, 2) }}</td>
                                                    @endif
                                                @else
                                                    <td>Rp. {{ number_format(0, 2) }}</td>
                                                @endif
                                                <td>Rp. {{ number_format($item['price'], 2) }}</td>
                                                <td>
                                                    <a href="{{ route('delete-item-cart', $item['item']->id) }}"
                                                       class="btn" style="padding: 7px 15px"><i class="fas fa-trash"></i> Hapus</a>
                                                    <a href="{{ route('detail-product', $item['item']->id) }}"
                                                       class="btn" style="padding: 7px 15px"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                        <td>-</td>
                                    @endif
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
