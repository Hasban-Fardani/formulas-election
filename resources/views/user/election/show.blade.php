@extends('layouts.app')

@section('title')
    {{ $election->title }}
@endsection

@section('content')
    <div class="container">
        <a href="{{ route('user.home') }}" class="btn btn-secondary">Kembali</a>
        <h2 class="text-center fw-bold">{{ $election->title }}</h2>

        <div class="d-flex flex-wrap justify-content-center align-items-center gap-3 mt-3">
            @foreach ($election->candidates as $candidate)
                <div class="card bg-white" style="height: 325px">
                    <img src="{{ asset('storage/candidate/' . $candidate->image) }}" class="card-img-top img-candidate"
                        alt="Foto {{ $candidate->name }}">
                    <div class="card-body" style="word-wrap: break-word;max-width: 200px;">
                        <h5 class="card-title">{{ $candidate->name }}
                        </h5>

                        <div class="d-flex justify-content-end gap-3">
                            <button class="btn btn-secondary"
                                onclick="showVisiMisi('{{ $candidate->name }}', '{{ $candidate->image }}', '{{ $candidate->vision }}', '{{ $candidate->mission }}')">
                                Visi & Misi
                            </button>
                            <button type="button" class="btn btn-primary"
                                onclick="confirmVote('{{ $candidate->name }}', {{ $candidate->id }})">Vote</button>
                        </div>
                    </div>
                </div>

                <form id="voteForm{{ $candidate->id }}" action="{{ route('user.vote', $candidate) }}" method="post">
                    @csrf
                </form>
            @endforeach
        </div>
    </div>

    <div class="modal fade" id="visiMisiModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="visiMisiModalTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header border-0 text-center">
                    <h3 class="modal-title fs-4 fw-semibold text-center w-100" id="visiMisiModalTitle">Visi dan Misi</h3>
                </div>
                <div class="modal-body">

                    <div id="visiMisiContent">

                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('css')
    <style>
        .img-candidate {
            width: 200px !important;
            aspect-ratio: 1/1;
            object-fit: cover;
        }
    </style>
@endpush

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
    <script>
        function confirmVote(name, id) {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Anda akan memberikan suara ke " + name + "!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Saya yakin!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('voteForm' + id).submit();
                }
            })
        }

        function showVisiMisi(name, image, vision, mission) {
            document.getElementById('visiMisiModalTitle').innerHTML = `Visi dan Misi ${name}`;
            document.getElementById('visiMisiContent').innerHTML = `
                <h5>Visi</h5>
                <p>${vision}</p>
                <h5>Misi</h5>
                <div>${mission}</div>
            `;

            console.log(vision, mission);
            let modal = document.getElementById('visiMisiModal');
            modal = new bootstrap.Modal(modal)
            modal.show()
        }
    </script>
@endpush
