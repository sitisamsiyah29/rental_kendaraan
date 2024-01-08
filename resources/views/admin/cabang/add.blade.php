@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('cabang.store')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label">Nama Cabang</label>
                <input type="text" name="nama_cabang" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat Cabang</label>
                <textarea name="alamat_cabang" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon Cabang</label>
                <input type="text" name="no_telepon_cabang" class="form-control">
            </div>
            <a href="{{route('cabang.index')}}" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Tambah</button>
        </form>
    </div>
</div>
@endsection