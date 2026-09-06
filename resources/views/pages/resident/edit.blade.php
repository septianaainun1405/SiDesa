@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Penduduk</h1>
        <a href="/residents" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show shadow-sm" role="alert">
            <ul class="mb-0 mt-1">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="row">
        <div class="col">
            <form action="/residents/{{ $resident->id }}" method="POST" class="needs-validation" novalidate>
                @csrf
                @method('PUT')
                <div class="card shadow">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Form Ubah Penduduk</h6>
                    </div>
                    <div class="card-body">

                        <div class="form-group">
                            <label for="nik">NIK</label>
                            <input type="text"
                                class="form-control @error('nik') is-invalid @enderror"
                                id="nik" name="nik" maxlength="16" pattern="\d{16}"
                                value="{{ old('nik', $resident->nik) }}" placeholder="Masukkan 16 digit NIK" required>
                            @error('nik')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">NIK wajib diisi.</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text"
                                class="form-control @error('name') is-invalid @enderror"
                                id="name" name="name" value="{{ old('name', $resident->name) }}"
                                placeholder="Masukkan nama lengkap" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Nama lengkap wajib diisi.</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control @error('gender') is-invalid @enderror"
                                id="gender" name="gender" required>
                                <option value="" disabled>Pilih Jenis Kelamin</option>
                                <option value="male" {{ old('gender', $resident->gender) == 'male' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="female" {{ old('gender', $resident->gender) == 'female' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Silakan pilih jenis kelamin.</div>
                            @enderror
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="birth_place">Tempat Lahir</label>
                                <input type="text"
                                    class="form-control @error('birth_place') is-invalid @enderror"
                                    id="birth_place" name="birth_place" value="{{ old('birth_place', $resident->birth_place) }}"
                                    placeholder="Contoh: Brebes" required>
                                @error('birth_place')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Tempat lahir wajib diisi.</div>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="birth_date">Tanggal Lahir</label>
                                <input type="date"
                                    class="form-control @error('birth_date') is-invalid @enderror"
                                    id="birth_date" name="birth_date"
                                    value="{{ old('birth_date', \Carbon\Carbon::parse($resident->birth_date)->format('Y-m-d')) }}" required>
                                @error('birth_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @else
                                    <div class="invalid-feedback">Tanggal lahir wajib diisi.</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <textarea class="form-control @error('address') is-invalid @enderror"
                                id="address" name="address" rows="3"
                                placeholder="Masukkan alamat lengkap" required>{{ old('address', $resident->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Alamat wajib diisi.</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <input type="text"
                                class="form-control @error('religion') is-invalid @enderror"
                                id="religion" name="religion" value="{{ old('religion', $resident->religion) }}"
                                placeholder="Contoh: Islam">
                            @error('religion')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="marital_status">Status Perkawinan</label>
                            <select class="form-control @error('marital_status') is-invalid @enderror"
                                id="marital_status" name="marital_status" required>
                                <option value="" disabled>Pilih Status Perkawinan</option>
                                <option value="single" {{ old('marital_status', $resident->marital_status) == 'single' ? 'selected' : '' }}>Belum Kawin</option>
                                <option value="married" {{ old('marital_status', $resident->marital_status) == 'married' ? 'selected' : '' }}>Kawin</option>
                                <option value="divorced" {{ old('marital_status', $resident->marital_status) == 'divorced' ? 'selected' : '' }}>Cerai Hidup</option>
                                <option value="widowed" {{ old('marital_status', $resident->marital_status) == 'widowed' ? 'selected' : '' }}>Cerai Mati</option>
                            </select>
                            @error('marital_status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Silakan pilih status perkawinan.</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="occupation">Pekerjaan</label>
                            <input type="text"
                                class="form-control @error('occupation') is-invalid @enderror"
                                id="occupation" name="occupation" value="{{ old('occupation', $resident->occupation) }}"
                                placeholder="Contoh: Pegawai Swasta">
                            @error('occupation')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor Telepon</label>
                            <input type="text"
                                class="form-control @error('phone') is-invalid @enderror"
                                id="phone" name="phone" maxlength="15" value="{{ old('phone', $resident->phone) }}"
                                placeholder="Contoh: 081234567890">
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="status">Status Penduduk</label>
                            <select class="form-control @error('status') is-invalid @enderror"
                                id="status" name="status" required>
                                <option value="" disabled>Pilih Status Penduduk</option>
                                <option value="active" {{ old('status', $resident->status) == 'active' ? 'selected' : '' }}>Aktif</option>
                                <option value="moved" {{ old('status', $resident->status) == 'moved' ? 'selected' : '' }}>Pindah</option>
                                <option value="deceased" {{ old('status', $resident->status) == 'deceased' ? 'selected' : '' }}>Meninggal</option>
                            </select>
                            @error('status')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @else
                                <div class="invalid-feedback">Silakan pilih status penduduk.</div>
                            @enderror
                        </div>

                    </div>
                    <div class="card-footer bg-white d-flex justify-content-end">
                        <a href="/residents" class="btn btn-secondary mr-2">Batal</a>
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-save fa-sm"></i> Simpan Perubahan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Custom validation styling script -->
    <script>
        (function () {
            'use strict';
            const forms = document.querySelectorAll('.needs-validation');
            Array.prototype.slice.call(forms).forEach(function (form) {
                form.addEventListener('submit', function (event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
@endsection