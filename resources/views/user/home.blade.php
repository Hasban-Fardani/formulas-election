@extends('layouts.app')

@section('title')
    Aplikasi Pemilihan IRMA Formulas
@endsection

@section('content')
    <div class="container">
        <h2 class="text-center fw-bold">Daftar Pemilihan Yang Tersedia</h2>
        <div class="mt-4 d-flex gap-3 justify-content-center align-items-center">
            @foreach ($elections as $election)
                <div class="card bg-white" style="max-width: 350px;">
                    <img src="{{ asset('storage/election/' . $election->image) }}" class="card-img-top img-candidate"
                        alt="Foto {{ $election->title }}">
                    <div class="card-body">
                        <h4 class="card-title fw-semibold">{{ $election->title }}</h4>

                        <div>
                            <h6 class="m-0 p-0">Waktu Pelaksanaan:</h6>
                            <p class="m-0 p-0"><span
                                    class="text-primary">{{ date('d-m-Y', strtotime($election->start_time)) }}</span> -
                                <span class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
                        </div>

                        <div class="text-center">
                            @if ($user->canVote($election))
                                <a href="{{ route('user.election.show', $election) }}" class="btn btn-primary mt-3">Vote</a>
                            @else
                                <div class="mt-3">
                                    <h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35"
                                            fill="currentColor" class="bi bi-check-circle text-success" viewBox="0 0 16 16">
                                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16" />
                                            <path
                                                d="m10.97 4.97-.02.022-3.473 4.425-2.093-2.094a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05" />
                                        </svg>
                                        Anda sudah memilih
                                    </h3>
                                    {{-- <a href="{{ route('user.election.results', $election) }}">Lihat hasil</a> --}}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
@push('css')
    <style>
        .img-candidate {
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    </style>
@endpush
