@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ( $elections as $election)
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $election->title }}</h4>
                
                <div>
                    <h6>Waktu</h6>
                    <p>{{  date('d-m-Y', strtotime($election->start_time))  }} - {{ date('d-m-Y', strtotime($election->end_time)) }}</p>
                </div>
            
                @if ($user->canVote($election))
                    <a href="{{ route('election.show-public', $election) }}" class="btn btn-primary">Vote</a>
                @else
                    <a href="{{ route('election.results', $election) }}">Lihat hasil</a>
                @endif
            </div>
        </div>
    @endforeach
</div>
@endsection
