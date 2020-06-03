<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Konco Tani - Daftar</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin-lte3/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('admin-lte3/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('admin-lte3/dist/css/adminlte.min.css') }}">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href="#"><b>KONCO</b> Tani</a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Form Pendaftaran</p>

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <small class="text-danger">{{ $errors->first('name') }}</small>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Nama lengkap" name="name" value="{{ old('name') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('email') }}</small>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('province_id') }}</small>
                <div class="input-group mb-3">
                    <select class="form-control" id="province_id" name="province_id"></select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('regency_id') }}</small>
                <div class="input-group mb-3">
                    <select class="form-control" id="regency_id" name="regency_id"></select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('district_id') }}</small>
                <div class="input-group mb-3">
                    <select class="form-control" id="district_id" name="district_id"></select>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('address') }}</small>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Alamat" name="address" value="{{ old('address') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-home"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('phone') }}</small>
                <div class="input-group mb-3">
                    <input type="number" class="form-control" placeholder="No HP" name="phone" value="{{ old('phone') }}">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-phone"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('password') }}</small>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <small class="text-danger">{{ $errors->first('retype_password') }}</small>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Ulangi password" name="retype_password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="agreeTerms" name="terms" value="agree" required>
                            <label for="agreeTerms">
                                Saya menyetujui <a href="#">persyaratan & ketentuan</a>
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Daftar</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <p>Sudah mendaftar ? <a href="login.html" class="text-center">Masuk</a></p>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="{{ asset('admin-lte3/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('admin-lte3/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin-lte3/dist/js/adminlte.min.js') }}"></script>
<!-- Indoregion -->
<script src="{{ asset('js/indoregion.js') }}"></script>
</body>
</html>
