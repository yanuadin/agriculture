@extends('layouts.master_backend')
@section('title', 'Konco Tani - Admin (Barang)')
@section('content')
    <section class="content">
        <div class="container col-md-10">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="col-md">
                        <h3 class="card-title">Tambah Barang</h3>
                    </div>
                </div>

                <!-- /.card-header -->
                <div class="card-body">
                    <form action="{{ route('admin.item.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Barang</label>
                            <input type="text" class="form-control" id="name"
                                   placeholder="Masukkan nama barang" name="name" value="{{ old('name') }}">
                            <small class="text-danger">{{ $errors->first('name') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Jumlah</label>
                            <input type="number" class="form-control" id="quantity"
                                   placeholder="Masukkan jumlah barang" name="quantity" value="{{ old('quantity') }}">
                            <small class="text-danger">{{ $errors->first('quantity') }}</small>
                        </div>
                        <div class="form-group">
                            <label for="price">Harga @pcs</label>
                            <input type="number" class="form-control" id="price"
                                   placeholder="Masukkan harga barang @pcs" name="price" value="{{ old('price') }}">
                            <small class="text-danger">{{ $errors->first('price') }}</small>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="discount">Diskon</label>
                                    <small class="text-danger">(optional)</small>
                                    <input type="number" class="form-control" id="discount"
                                           placeholder="Masukkan harga barang" name="discount" value="{{ old('discount') }}">
                                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="unit">Satuan</label>
                                    <small class="text-danger">(wajib jika mengisi diskon)</small>
                                    <select class="form-control" id="unit" name="unit">
                                        <option selected disabled value="" name="unit">-- Pilih Satuan --</option>
                                        <option value="Harga">Harga</option>
                                        <option value="Persentase">Persentase</option>
                                    </select>
                                    <small class="text-danger">{{ $errors->first('unit') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Deskripsi</label>
                            <small class="text-danger">(optional)</small>
                            <textarea class="form-control" rows="3" placeholder="Masukkan deskripsi"
                                      name="description" id="description">{{ old('description') }}</textarea>
                            <small class="text-danger">{{ $errors->first('description') }}</small>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <label for="">Preview Gambar Pertama</label>
                                <img id="preview1" src="{{ asset('img/no-image.png') }}" alt="Image1" class="img-thumbnail"/>
                            </div>
                            <div class="col-md">
                                <label for="">Preview Gambar Kedua</label>
                                <img id="preview2" src="{{ asset('img/no-image.png') }}" alt="Image2" class="img-thumbnail"/>
                            </div>
                            <div class="col-md">
                                <label for="">Preview Gambar Ketiga</label>
                                <img id="preview3" src="{{ asset('img/no-image.png') }}" alt="Image1" class="img-thumbnail"/>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="image1">Gambar Pertama</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image1" name="image1">
                                            <label class="custom-file-label" for="image1">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('image1') }}</small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="image2">Gambar Kedua</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image2" name="image2">
                                            <label class="custom-file-label" for="image2">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('image2') }}</small>
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="form-group">
                                    <label for="image3">Gambar Ketiga</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image3" name="image3">
                                            <label class="custom-file-label" for="image3">Choose file</label>
                                        </div>
                                    </div>
                                    <small class="text-danger">{{ $errors->first('image3') }}</small>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center mt-3">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
@endsection
@section('script')
    <!-- Image Perview -->
    <script>
        function readURL(input, image) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $(image).attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#image1").change(function() {
            readURL(this, $('#preview1'));
        });

        $("#image2").change(function() {
            readURL(this, $('#preview2'));
        });

        $("#image3").change(function() {
            readURL(this, $('#preview3'));
        });
    </script>
@endsection
