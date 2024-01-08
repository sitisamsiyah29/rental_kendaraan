@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('cabang.update', $cabang->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control"
                    value="{{old('nama_cabang', $cabang->nama_cabang)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Cabang</label>
                <textarea name="alamat_cabang"
                    class="form-control">{{old('alamat_cabang', $cabang->alamat_cabang)}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon Cabang</label>
                <input type="text" name="no_telepon_cabang" class="form-control"
                    value="{{old('no_telepon_cabang', $cabang->no_telepon_cabang)}}">
            </div>
            <a href="{{route('cabang.index')}}" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Simpan</button>
        </form>
    </div>
</div>
@endsection