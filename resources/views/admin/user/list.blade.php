@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between">
    <h2 class="fw-bold">Daftar User</h2>
    <div>
        <button>Import User</button>
        <button data-bs-toggle="modal" data-bs-target="#createUserModal" class="btn btn-primary">Buat User Baru</button>
    </div>
</div>

<div class="card mt-4 bg-white">
    <div class="card-body">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">nis</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->nis }}</td>
                        <td>
                            <a href="{{ route('admin.user.show', $user) }}" class="btn btn-primary">Lihat</a>
                            <a href="{{ route('admin.user.edit', $user) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('admin.user.destroy', $user) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $users->links() }}
    </div>
</div>

{{-- Create user modal --}}
<div class="modal fade" id="createUserModal">
    <div class="modal-dialog">
        <div class="modal-content p-4 bg-white">
            <h2 class="fw-bold">Buat User Baru</h2>

            <form action="{{ route('admin.user.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>

                <div class="mb-3">
                    <label for="nis" class="form-label">NIS</label>
                    <input type="number" class="form-control" id="nis" name="nis">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="text" class="form-control" id="password" name="password">
                </div>

                <button type="submit" class="btn btn-primary mt-3 float-end">Buat</button>
            </form>
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