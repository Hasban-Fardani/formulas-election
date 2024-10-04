@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between">
        <h2 class="fw-bold">List pemilihan</h2>
        <button data-bs-toggle="modal" data-bs-target="#createElectionModal" class="btn btn-primary">Buat Pemilihan</button>
    </div>

    <div class="card mt-4 bg-white">
        <div class="card-body">
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Status</th>
                        <th scope="col">Jumlah kandidat</th>
                        <th scope="col">Tanggal Mulai</th>
                        <th scope="col">Tanggal Selesai</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($elections as $election)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $election->title }}</td>
                            <td>{{ $election->isActive() ? 'Aktif' : 'Tidak aktif' }}</td>
                            <td>{{ $election->candidates_count }}</td>
                            <td>{{ date('d-m-Y', strtotime($election->start_time)) }}</td>
                            <td>{{ date('d-m-Y', strtotime($election->end_time)) }}</td>
                            <td><a href="{{ route('admin.election.show', $election) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $elections->links() }}
        </div>
    </div>

    {{-- Create election modal --}}
    <div class="modal fade" id="createElectionModal">
        <div class="modal-dialog">
            <div class="modal-content p-4 bg-white">
                <h2 class="fw-bold">Buat pemilihan</h2>

                <div class="card bg-white">
                    <div class="card-body">
                        <form action="{{ route('admin.election.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="image" class="form-label">Gambar</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>

                            <div class="mb-3">
                                <label for="title" class="form-label">Judul</label>
                                <input type="text" class="form-control" id="title" name="title">
                            </div>

                            <div class="mb-3 d-flex gap-3">
                                <div>
                                    <label for="start_time" class="form-label">Mulai</label>
                                    <input type="datetime-local" class="form-control" id="start_time" name="start_time">
                                </div>
                                <div>
                                    <label for="end_time" class="form-label">Selesai</label>
                                    <input type="datetime-local" class="form-control" id="end_time" name="end_time">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Buat</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        th[scope="col"],
        tr td,
        tr th {
            background-color: white !important;
        }

        .modal-content {
          width: 110%;
        }
    </style>
@endpush
