@extends('layouts.app')

@section('title')
    Hasil Voting
@endsection

@section('content')
    <div class="container">
        <div class="d-flex w-100 justify-content-between align-items-center">
            <a href="{{ route('user.home') }}" class="btn btn-secondary">Kembali</a>
            <button class="btn btn-primary" onclick="exportChartToPDF()">Export PDF</button>
        </div>

        <h2 class="text-center mt-3">{{ $election->title }}</h2>

        <div class="text-center">
            <p>Waktu: <span class="text-primary">{{ date('d-m-Y', strtotime($election->start_time)) }}</span> - <span
                    class="text-primary">{{ date('d-m-Y', strtotime($election->end_time)) }}</span></p>
        </div>

        <div class="d-flex justify-content-center align-items-center gap-3" id="toPrint">
            <div style="position: relative;width:400px">
                <canvas id="pieChart" width="400px"></canvas>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function exportChartToPDF() {
            const jsPDF = window.jspdf;

            // Buat instance jsPDF
            const doc = new jsPDF({
                unit: 'px',
                compress: true,
            });

            // Ambil elemen canvas
            const canvas = document.getElementById('pieChart');

            // Konversi canvas menjadi Data URL (gambar dalam format base64)
            const imgData = canvas.toDataURL('image/png');

            // Tentukan ukuran gambar dan proporsi dalam PDF
            const imgWidth = 180;
            const imgHeight = (canvas.height * imgWidth) / canvas.width;

            // Dapatkan lebar halaman untuk menghitung posisi horizontal gambar (supaya di tengah)
            const pageWidth = doc.internal.pageSize.getWidth();
            const xPosition = (pageWidth - imgWidth) / 2;  // Hitung posisi horizontal di tengah

            // Tambahkan judul pemilihan di atas chart
            const electionName = "{{ $election->title }}";  // Variabel dari Laravel
            doc.setFontSize(16);
            doc.text(electionName, pageWidth / 2, 40, { align: 'center' });

            // Tambahkan gambar ke dokumen PDF di posisi tengah
            doc.addImage(imgData, 'PNG', xPosition, 60, imgWidth, imgHeight);

            // Simpan file PDF
            doc.save('hasil {{ $election->title }}.pdf');
        }
    </script>

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
