@extends('layouts.app')

@section('content')

<div class="container">
    <a href="{{ route('user.home') }}" class="btn btn-secondary">Kembali</a>
    <h2 class="text-center fw-bold">{{ $election->title }}</h2>


    <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-3">
        @foreach ($election->candidates as $candidate)
            <div class="card">
                <img src="{{ asset('storage/candidate/'.$candidate->image) }}" class="card-img-top img-candidate" alt="Foto {{ $candidate->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $candidate->name }}</h5>

                    <div class="d-flex justify-content-end gap-3">
                        <button class="btn btn-secondary">Visi & Misi</button>
                        <form action="{{ route('user.vote', $candidate) }}" method="post">
                            @csrf
                            <button type="submit" class="btn btn-primary">Vote</button>
                        </form>
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
            width: 200px !important;
        }
    </style>
@endpush