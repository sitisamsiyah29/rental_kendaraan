@extends('layouts.app');

@section('content')
<div class="container mx-auto" style="padding-top: 110px;">
    <h2 class="text-center">Kendaraan Yang Saya Sewa</h2>
    <br>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="table-dark">
                <th>No</th>
                <th>Nama Cabang</th>
                <th>Alamat Cabang</th>
                <th>No Telepon Cabang</th>
                <th>Merek Kendaraan</th>
                <th>Model Kendaraan</th>
                <th>Status</th>
            </thead>
            <tbody>
                @php
                $no = 1;
                @endphp
                @foreach ($penyewaan as $data)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$data->kendaraan->cabang->nama_cabang}}</td>
                    <td>{{$data->kendaraan->cabang->alamat_cabang}}</td>
                    <td>{{$data->kendaraan->cabang->no_telepon_cabang}}</td>
                    <td>{{$data->kendaraan->merek}}</td>
                    <td>{{$data->kendaraan->model}}</td>
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
@endsection