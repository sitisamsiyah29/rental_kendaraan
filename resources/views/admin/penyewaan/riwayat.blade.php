@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead class="table-dark">
                    <th>No</th>
                    <th>Nama Pengguna</th>
                    <th>Merek Kendaraan</th>
                    <th>Model Kendaraan</th>
                    <th>No Telepon Pengguna</th>
                    <th>Status</th>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($penyewaan as $data)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$data->pengguna->nama}}</td>
                        <td>{{$data->kendaraan->merek}}</td>
                        <td>{{$data->kendaraan->model}}</td>
                        <td>{{$data->pengguna->no_telepon}}</td>
                        <td>
                            @if ($data->status == 0)
                            <span class="badge text-bg-warning">Menunggu Persetujuan Admin</span>
                            @elseif ($data->status == 1)
                            <span class="badge text-bg-primary">Sedang Anda Sewa</span>
                            @elseif ($data->status == 2)
                            <span class="badge text-bg-danger">Permintaan Anda Ditolak</span>
                            @else
                            <span class="badge text-bg-success">Sudah Selesai</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection