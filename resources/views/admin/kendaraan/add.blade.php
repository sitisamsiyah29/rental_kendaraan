@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('kendaraan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label">Cabang</label>
                <select name="cabang" class="form-control">
                    <option value="" selected disabled>Pilih...</option>
                    @foreach ($cabang as $data)
                    <option value="{{$data->id}}">{{$data->nama_cabang}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Merek</label>
                <input name="merek" class="form-control" placeholder="Masukan merek kendaraan">
            </div>
            <div class="mb-3">
                <label class="form-label">Model</label>
                <input name="model" class="form-control" placeholder="Masukan model kendaraan">
            </div>
            <div class="mb-3">
                <label class="form-label">Tahun Produksi</label>
                <input type="number" name="tahun_produksi" min="1900" max="2023" step="1"
                    placeholder="Masukan tahun produksi kendaraan" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Nomor Plat</label>
                <input name="nomor_plat" class="form-control" placeholder="Masukan nomor plat kendaraan">
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label class="form-label">Foto Kendaraan</label>
                        <input name="image" type="file" class="form-control" accept="image/*"
                            onchange="previewImage(event)">
                    </div>
                </div>
                <div class="col-md-6 row justify-content-center">
                    <img id="preview" src="{{asset('assets/images/default.png')}}" alt="Preview Gambar"
                        class="img-fluid">
                </div>
            </div>
            <a href="{{route('kendaraan.index')}}" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Tambah</button>
        </form>
    </div>
</div>
@endsection
<script>
    function previewImage(event) {
      var input = event.target;
      var preview = document.getElementById('preview');

      var reader = new FileReader();

      reader.onload = function() {
        preview.src = reader.result;
      };

      reader.readAsDataURL(input.files[0]);
    }
</script>