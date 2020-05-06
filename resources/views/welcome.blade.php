@extends('layouts.frontend')

@section('content')
    <div class="container-fluid py-5 position-absolute w-100 h-100 bg-primary">
        <div class="row mt-lg-5 mt-md-0 pt-lg-5 pt-md-0">
            <div class="col-md-6 text-center mt-lg-5 mt-md-0">
                <div class="w-50 p-5 my-5 shadow bg-white d-inline-block rounded card-icon" onclick="movePages('{{ url('peminjaman') }}')">
                    <div class="position-relative">
                        <h1><i class="fas fa-book text-primary icon-lg mb-3"></i></h1>
                        <h5>Peminjaman Buku</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center mt-lg-5 mt-md-0">
                <div class="w-50 p-5 my-5 shadow bg-white d-inline-block rounded card-icon" onclick="movePages('{{ url('pengembalian') }}')">
                    <div class="position-relative">
                        <h1><i class="fas fa-book text-danger icon-lg mb-3"></i></h1>
                        <h5>Pengembalian Buku</h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="position-absolute login-btn">
            <button class="btn btn-light px-5" onclick="movePages('{{ url('login') }}')">
                <i class="fas fa-door-open text-success"></i> Login
            </button>
        </div>
    </div>

    <script>
        function movePages(link) {
            window.location.href = link
        }
    </script>

@endsection
