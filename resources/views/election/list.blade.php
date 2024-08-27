@extends('layouts.admin')

@section('content')
<h2>List pemilihan</h2>

<div class="card">
    <div class="card-body">
        <table class="table bg-white">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
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
                  <td>{{ date('d-m-Y', strtotime($election->start_time)) }}</td>
                  <td>{{ date('d-m-Y', strtotime($election->end_time)) }}</td>
                  <td><a href="{{ route('election.show', $election) }}" class="btn btn-primary">Lihat</a></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          {{ $elections->links() }}
    </div>
</div>
@endsection