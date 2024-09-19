@extends('layouts.app')

@section('title')
    Hasil Voting
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('user.home') }}" class="btn btn-primary">Kembali</a>
        <h2 class="text-center">{{ $election->title }}</h2>

        <div class="text-center">
            <p>Waktu: <span class="text-primary">{{ date('d-m-Y', strtotime($election->start_time)) }}</span> - <span
                    class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
        </div>

        <div class="d-flex justify-content-center align-items-center gap-3">
            <canvas id="pieChart"></canvas>
        </div>
    </div>
@endsection
@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('pieChart').getContext('2d');
        const chart = new Chart(ctx, {
            type: 'pie',
            data: {!! json_encode($chartData) !!},
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top'
                    }
                }
            }
        });
    </script>
@endpush
@push('css')
    <style>
        .img-candidate {
            width: 200px;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    </style>
@endpush
