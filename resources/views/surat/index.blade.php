@extends('layouts.index')

@section('judul','Surat Warga')

@section('konten')
<div class="card p-4">
<h3>Daftar Pengajuan Surat Kelurahan</h3>
    <div class="d-flex justify-content-between align-items-center mb-3">
<!-- BUTTON TAMBAH: Mengarah ke rute surat.create -->
        <a href="{{ route('surat.create') }}" class="btn btn-primary btn-sm">
            <i class="fas fa-plus-circle-notch mr-1"></i> Tambah Pengajuan Surat
        </a>
    </div>

    <!-- FLASH SESSION: Menampilkan notifikasi sukses setelah redirect -->
    @if(session('sukses'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="icon fas fa-check-circle mr-2"></i> {{ session('sukses') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



<table class="table table-striped table-bordered mt-3">
    <thead>
        <tr>
        <th>No Surat</th>
        <th>Jenis Surat</th>
        <th>Nama Pemohon</th>
        <th>NIK Pemohon</th>
        <th>Tanggal Ajuan</th>
        <th>Aksi</th>
        </tr>
    </thead>
<tbody>
@foreach($semuaSurat as $s)
<tr>
    <td>{{ $s->nomor_surat }}</td>
    <td>{{ $s->jenis_surat }}</td>
    <td>{{ $s->penduduk->nama }}</td>
    <td>{{ $s->penduduk->nik }}</td>
    <td>{{ $s->tanggal_ajuan }}</td>
    <td>
        <div class="btn-group" role="group">
            <!-- Tombol Menuju Halaman Edit -->
            <a href="{{ route('surat.edit', $s->id) }}" class="btn btn-warning btn-sm">
                <i class="fas fa-edit"></i> Edit
            </a>

            <!-- Tombol Hapus Menggunakan Form POST dengan Method Spoofing DELETE -->
            <form action="{{ route('surat.destroy', $s->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data surat ini?')" class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash"></i> Hapus
                </button>
            </form>
        </div>
    </td>

</tr>
@endforeach
</tbody>
</table>
</div>
@endsection