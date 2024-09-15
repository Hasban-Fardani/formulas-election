@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center fw-bold">Daftar Pemilihan Yang Tersedia</h2>
    @foreach ( $elections as $election)
        <div class="card bg-white" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $election->title }}</h4>
                
                <div>
                    <h6>Waktu Pelaksanaan:</h6>
                    <p><span class="text-primary">{{  date('d-m-Y', strtotime($election->start_time))  }}</span>  - <span class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
                </div>
            
                <div class="text-center">
                    @if ($user->canVote($election))
                        <a href="{{ route('user.election.show', $election) }}" class="btn btn-primary">Vote</a>
                    @else
                        <a href="{{ route('user.election.results', $election) }}">Lihat hasil</a>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection
