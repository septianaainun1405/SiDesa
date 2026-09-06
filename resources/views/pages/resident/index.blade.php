@extends('layouts.app')

@section('content')
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Data Penduduk</h1>
        <a href="/residents/create" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>
    </div>

    {{-- Table --}}
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tempat Tanggal Lahir</th>
                                    <th>Alamat</th>
                                    <th>Agama</th>
                                    <th>Status Perkawinan</th>
                                    <th>Pekerjaan</th>
                                    <th>Telepon</th>
                                    <th>Status Penduduk</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            @if (count($residents) === 0)
                            <tbody>
                                <tr>
                                    <td colspan="12" class="text-center">Tidak ada data penduduk.</td>
                                </tr>
                            </tbody>
                            @else
                            <tbody>
                                @foreach ($residents as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->nik }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->gender }}</td>
                                    <td>{{ $item->birth_place }}, {{ $item->birth_date }}</td>
                                    <td>{{ $item->address }}</td>
                                    <td>{{ $item->religion }}</td>
                                    <td>{{ $item->marital_status }}</td>
                                    <td>{{ $item->occupation }}</td>
                                    <td>{{ $item->phone }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>
                                        <div>
                                            <a href="/residents/{{ $item->id }}" class="btn btn-sm btn-warning mb-1">
                                                <i class="fas fa-pen"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-danger mb-1" data-toggle="modal" data-target="#confirmationDelete-{{ $item->id }}">
                                                <i class="fas fa-eraser"></i>
                                            </button>
                                        </div>
                                        @include('pages.resident.confirmation-delete')
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection