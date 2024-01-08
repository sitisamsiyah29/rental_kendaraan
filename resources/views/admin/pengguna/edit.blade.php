@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{route('pengguna.update', $pengguna->id)}}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{old('nama', $pengguna->nama)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control">{{old('alamat', $pengguna->alamat)}}</textarea>
            </div>
            <div class="mb-3">
                <label class="form-label">No Telepon</label>
                <input type="text" name="no_telepon" class="form-control"
                    value="{{old('no_telepon', $pengguna->no_telepon)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{old('email', $pengguna->email)}}">
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
                <label class="form-label">Role</label>
                <select name="role" class="form-control">
                    <option value="" selected disabled>Pilih...</option>
                    <option value="0" {{old('role', $pengguna->role == 0 ? 'selected' : '')}}>User</option>
                    <option value="1" {{old('role', $pengguna->role == 1 ? 'selected' : '')}}>Admin</option>
                </select>
            </div>
            <a href="{{route('pengguna.index')}}" class="btn btn-danger py-8 fs-4 mb-4 rounded-2">Batal</a>
            <button type="submit" class="btn btn-success py-8 fs-4 mb-4 rounded-2">Simpan</button>
        </form>
    </div>
</div>
@endsection