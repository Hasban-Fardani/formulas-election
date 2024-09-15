@extends('layouts.admin')

@section('content')
<div class="d-flex justify-content-between">
    <h2 class="fw-bold">Daftar User</h2>
    <div>
        <button>Import User</button>
        <a href="{{ route('admin.user.create') }}" class="btn btn-primary">Buat User Baru</a>
    </div>
</div>

<div class="card mt-4 bg-white">
    <div class="card-body">
        <table class="table bg-white">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama</th>
                    <th scope="col">email</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
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