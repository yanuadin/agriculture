@extends('layouts.master')
@section('title', 'Konco Tani - Pesanan')
@section('content')
<!-- about-area-start -->
<div class="about-area pt-120 pb-80">
    <div class="container">
        <div class="row">
            <form action="{{ route('find-order') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="code"><h4><b>Kode Pemesanan</b></h4></label>
                    <div class="input-group">
                        <input class="form-control" type="text" name="code" id="code" placeholder="Masukkan kode pemesanan">
                        <button type="submit" class="btn btn-primary ml-3">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- about-area-end -->
@endsection
