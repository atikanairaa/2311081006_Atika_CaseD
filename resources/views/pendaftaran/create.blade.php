@extends('layouts.main')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4>Tambah Peserta</h4>
                        <a href="{{ route('pendaftaran.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>

                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('pendaftaran.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama_peserta" class="form-label">Nama Peserta<span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_peserta') is-invalid @enderror"
                                    id="nama_peserta" name="nama_peserta" value="{{ old('nama_peserta') }}" required>
                                @error('nama_peserta')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="nama_kursus" class="form-label">Nama Kursus <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('nama_kursus') is-invalid @enderror"
                                    id="nama_kursus" name="nama_kursus" value="{{ old('nama_kursus') }}" required>
                                @error('nama_kursus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori_kursus" class="form-label">Kategori Kursus <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('kategori_kursus') is-invalid @enderror"
                                    id="kategori_kursus" name="kategori_kursus" value="{{ old('kategori_kursus') }}" required>
                                @error('kategori_kursus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror"
                                    id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai') }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror"
                                    id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai') }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="status_pendaftaran" class="form-label">Status Pendaftaran <span class="text-danger">*</span></label>
                                <select class="form-control @error('status_pendaftaran') is-invalid @enderror"
                                    id="status_pendaftaran" name="status_pendaftaran">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="terdaftar" {{ old('status_pendaftaran') == 'terdaftar' ? 'selected' : '' }}>Terdaftar</option>
                                    <option value="aktif" {{ old('status_pendaftaran') == 'aktif' ? 'selected' : '' }}>Aktif</option>
                                    <option value="selesai" {{ old('status_pendaftaran') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                                    <option value="dibatalkan" {{ old('status_pendaftaran') == 'dibatalkan' ? 'selected' : '' }}>Dibatalkan</option>
                                </select>
                                @error('status_pendaftaran')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
