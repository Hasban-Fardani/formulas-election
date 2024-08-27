@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
    <h2 class="text-center">{{ $election->title }}</h2>

    <div>
        <p>Waktu: <span class="text-primary">{{  date('d-m-Y', strtotime($election->start_time))  }}</span>  - <span class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
    </div>
    <h5>Kandidat:</h5>

    <div class="d-flex justify-content-center align-items-center gap-3">
        @foreach ($election->candidates as $candidate)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $candidate->name }}</h5>

                    <form action="{{ route('vote', $candidate) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">Vote</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection