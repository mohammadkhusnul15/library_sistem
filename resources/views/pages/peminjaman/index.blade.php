@extends('layouts.frontend')

@section('content')

<style>
    body {
        background-color: #007bff;
    }
</style>

@if (request()->get('search') !== "" && request()->get('search') !== null && $books->total() !== 0)
<div class="container-fluid py-5 h-100 bg-primary">
    <div class="container">
        <div class="row my-5 pb-5">
            <div class="col-md-8 offset-md-2 mb-4">
            <a href="{{ url('/') }}" class="btn btn-light px-5"><i class="fas fa-backspace"></i>
                {{ $books }}
            </a>
            </div>
            <div class="col-md-8 offset-md-2 shadow p-5 rounded bg-white card-icon mb-3">
                <div class="position-relative">
                    <form method="GET">
                        <div class="form-group">
                            <label for="search">Search any books</label>
                            <input type="text" name="search" id="book" autocomplete="off" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary px-5"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
            @foreach ($books as $book)
                <div class="col-md-8 offset-md-2 pt-3 pb-2 shadow rounded bg-white">
                    <a href='{{ url("peminjaman/$book->id") }}' class="text-dark">
                    <div class="row">
                        <div class="col-sm-2 p-3">
                            <img src='{{ asset("img/books/$book->picture") }}' style="height: 100px" alt="">
                        </div>
                        <div class="col-sm-10 py-3">
                            <h5 class="mb-0">{{ $book->name }}</h5>
                            <p>Author {{ $book->author }}, Penerbit {{ $book->publisher }}</p>
                            <p class="mb-0">Di Rak {{ $book->rack }} Tingkat {{ $book->stack }}</p>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
@else
<div class="container-fluid py-5 w-100 h-100 bg-primary position-absolute">
    <div class="container my-5 py-5">
        <div class="row my-5 pb-5">
            <div class="col-md-8 offset-md-2 mb-4">
            <a href="{{ url('/') }}" class="btn btn-light px-5"><i class="fas fa-backspace"></i> Back</a>
            </div>
            <div class="col-md-8 offset-md-2 shadow p-5 rounded bg-white card-icon mb-5">
                <div class="position-relative">
                    <form method="GET">
                        <div class="form-group">
                            <label for="search">Search any books</label>
                            <input type="text" autocomplete="off" name="search" id="book" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary px-5"><i class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endif

@endsection
