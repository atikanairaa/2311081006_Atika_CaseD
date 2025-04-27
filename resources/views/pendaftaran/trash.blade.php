@extends('layouts.main')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Daftar Sampah</h4>
                    </div>
                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
        
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Peserta</th>
                                        <th>Email</th>
                                        <th>Nama Kursus</th>
                                        <th>Kategori Kursus</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Status Pendaftaran</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($kelass as $index => $kelas)
                                        <tr>
                                            <td>{{ $kelass->firstItem() + $index }}</td>
                                            <td>{{ $kelas->nama_peserta }}</td>
                                            <td>{{ $kelas->email }}</td>
                                            <td>{{ $kelas->nama_kursus }}</td>
                                            <td>{{ $kelas->kategori_kursus }}</td>
                                            <td>{{ $kelas->tanggal_mulai }}</td>
                                            <td>{{ $kelas->tanggal_selesai }}</td>
                                            <td>{{ $kelas->status_pendaftaran }}</td>
                                            <td>
                                                <div class="d-flex">
                                                    <form action="{{ route('pendaftaran.restore', $kelas->id) }}" method="POST" style="display:inline;">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">Pulihkan</button>
                                                    </form>
                                                                                                      
                                                    <form action="{{ route('pendaftaran.forceDelete', $kelas->id) }}" method="POST"
                                                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger">Hapus Permanen</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center">Tidak ada data peserta</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <a href="{{ route('pendaftaran.index') }}" class="btn btn-dark mt-4">Kembali</a>
            </div>
        </div>
    </div>
    <div class="pagination-container d-flex justify-content-center mt-4">
        {{ $kelass->links('pagination::bootstrap-5') }}
    </div>
@endsection