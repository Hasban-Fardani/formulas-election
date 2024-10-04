@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between">
        <h2 class="fw-bold">
            Detail Pemilihan: {{ $election->title }}
        </h2>

        <form action="{{ route('admin.election.destroy', $election) }}" method="post">
            @csrf
            @method('delete')

            <button type="submit" class="btn btn-danger">Hapus Pemilihan</button>
        </form>
    </div>

    <div class="card bg-white mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="fw-semibold">Informasi</h3>
                @if (!$edit)
                    <a href="{{ route('admin.election.show', ['election' => $election, 'edit' => true]) }}"
                        class="btn btn-warning">
                        Edit
                    </a>
                @endif
            </div>
            <form action="{{ route('admin.election.update', $election) }}" method="post">
                @csrf
                @method('put')

                <div class="mb-3">
                    <label for="title" class="form-label">Judul</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $election->title }}"
                        @disabled(!$edit)>
                </div>

                <div class="mb-3 d-flex gap-3 w-100">
                    <div class="w-50">
                        <label for="start_time" class="form-label">Mulai</label>
                        <input type="datetime" class="form-control" id="start_time" name="start_time"
                            value="{{ $election->start_time }}" @disabled(!$edit)>
                    </div>
                    <div class="w-50">
                        <label for="end_time" class="form-label">Selesai</label>
                        <input type="datetime" class="form-control" id="end_time" name="end_time"
                            value="{{ $election->end_time }}" @disabled(!$edit)>
                    </div>
                </div>

                @if ($edit)
                    <div class="d-flex justify-content-end gap-2">
                        <a href="{{ route('admin.election.show', $election) }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                @endif
            </form>
        </div>
    </div>

    <div class="card bg-white mt-4">
        <div class="card-body">
            <div class="d-flex justify-content-between">
                <h3 class="fw-semibold">Daftar Kandidat</h3>
                <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createCandidateModal">Tambah
                    Kandidat</button>
            </div>
            <table class="table bg-white">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama Kandidat</th>
                        <th scope="col">Visi</th>
                        <th scope="col">Misi</th>
                        <th scope="col">Total Vote</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                        <tr>
                            <th scope="row">{{ $candidate->number }}</th>
                            <td><img src="{{ asset('storage/candidate/'.$candidate->image) }}" alt="kandidat" width="100"></td>
                            <td>{{ $candidate->name }}</td>
                            <td>{{ $candidate->vision }}</td>
                            <td>{!! $candidate->mission !!}</td>
                            <td>{{ $candidate->votes_count }}</td>
                            <td>
                                <a class="btn btn-warning">Edit</a>
                               
                                <form action="{{ route('admin.candidate.destroy', $candidate) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                </form>
                            </td>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    {{-- Create candidate modal --}}
    <div class="modal fade" id="createCandidateModal">
        <div class="modal-dialog">
            <div class="modal-content p-4 bg-white">
                <h2 class="fw-bold">Buat kandidat</h2>
                <div class="bg-white">
                    <form action="{{ route('admin.candidate.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="election_id" value="{{ $election->id }}">
                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Gambar</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <div class="mb-3">
                            <label for="number" class="form-label">Nomer</label>
                            <input type="number" class="form-control" id="number" name="number">
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div>
                            <label for="vision" class="form-label">Visi</label>
                            <input type="text" class="form-control" id="vision" name="vision">
                        </div>
                        <div>
                            <label for="mission" class="form-label">Misi</label>
                            <textarea name="mission" id="tinyMCE"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 float-end">Buat</button>
                    </form>
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

        .modal-content {}
    </style>
@endpush
