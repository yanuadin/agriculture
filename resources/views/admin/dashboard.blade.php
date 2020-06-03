@extends('layouts.master_backend')
@section('title', 'Konco Tani - Admin')
@section('content')
    <section class="content">
        <div class="container-fluid">
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h5><i class="icon fas fa-check"></i> Success!</h5>
                    {{ $message }}
                </div>
            @endif
            <div class="alert alert-primary alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h5><i class="icon fas fa-check"></i> Selamat datang di dashboard {{ Auth::user()->role }}.</h5>
            </div>
        </div>
    </section>
@endsection
