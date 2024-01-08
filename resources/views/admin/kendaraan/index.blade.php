@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('kendaraan.create')}}" class="btn btn-primary py-8 fs-4 mb-4 rounded-2">Tambah Kendaraan</a>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Cabang</th>
                    <th>Foto Kendaraan</th>
                    <th>Merk</th>
                    <th>Model</th>
                    <th>Tahun Produksi</th>
                    <th>Nomor Plat</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($kendaraan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->nama_cabang}}</td>
                        <td><img src="{{asset('assets/images/kendaraan/'.$data->image)}}" class="img-fluid" alt=""></td>
                        <td>{{$data->merek}}</td>
                        <td>{{$data->model}}</td>
                        <td>{{$data->tahun_produksi}}</td>
                        <td>{{$data->nomor_plat}}</td>
                        <td>
                            @if ($data->status == 1)
                            <span class="badge text-bg-success">Tersedia</span>
                            @else
                            <span class="badge text-bg-danger">Sedang Disewa</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex">
                                <form action="{{route('kendaraan.destroy', $data->id)}}" method="post">
                                    <a href="{{route('kendaraan.edit', $data->id)}}"
                                        class="btn btn-sm btn-warning rounded-2 mx-1">Edit</a>

                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger rounded-2 mx-1">Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection