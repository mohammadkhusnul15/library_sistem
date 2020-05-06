@extends('layouts.frontend')

@section('content')
<style>
    body {
        background-color: #007bff;
    }
</style>
<div class="container my-5 py-5">
    <div class="row">
        <div class="col-md-8 offset-md-2 position-relative">
        <a href="{{ url('/') }}" role="button" type="button" class="btn mt-2 mb-4 px-3 btn-light"><i class="fas fa-backspace"></i> Back</a>
            <div class="w-100 bg-white card-icon rounded p-3 mb-4">
                <div class="position-relative pt-3">
                    <form method="get">
                        <div class="form-group">
                            <label for="search">Search your Loan Code</label>
                            <input type="text" name="search" id="search" placeholder="Format (XXXXX_USR-id)" class="form-control" placeholder="" aria-describedby="helpId">
                            <small class="text-info">* example (12345_USR-8)</small>
                            <div class="text-right">
                                <button type="button" class="btn btn-primary px-5 w-25 mt-2"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @if ($transaction !== null)
                <div class="bg-white w-100 rounded p-3">
                <a href='{{ url("pengembalian/$transaction->code_transaction") }}'>
                        <div class="row">
                            <div class="col-2 py-3 text-center">
                                <img class="d-inline-block" src='{{ asset("img/books/$book->picture") }}' height="100px" alt="">
                            </div>
                            <div class="col-10 pt-2">
                                <h5 class="text-dark my-1 font-weight-bold">{{ $user->name }} - {{ $user->class }} {{ $user->majors }}</h5>
                                <p class="text-dark my-1"> {{ $transaction->jumlah }} Buku - {{ $book->name }} </p>
                                <div class="alert alert-info alert-sm" role="alert">
                                    <strong>Loan Code : {{ $transaction->code_transaction }}</strong>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
