@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('home') }}" class="btn btn-primary">Kembali</a>
    <h2 class="text-center">{{ $election->title }}</h2>

    <div>
        <p>Waktu: <span class="text-primary">{{  date('d-m-Y', strtotime($election->start_time))  }}</span>  - <span class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
    </div>

    <div class="d-flex justify-content-center align-items-center gap-3">    
        @foreach ($data as $d)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $d['candidate']->name }}</h5>
                    <p>Total Pemilih: {{ $d['votes'] }}</p>
                </div>
            </div>
        @endforeach
    </div>

@endsection