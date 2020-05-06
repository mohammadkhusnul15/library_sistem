@extends('layouts.frontend')

@section('content')
<style>
    body {
        background-color: #007bff
    }
</style>
<div class="container my-5">
    <div class="row py-5">
        <div class="col-md-12 py-5 text-center text-white">
            <h1 style="font-size: 10rem"><i class="fas fa-check"></i></h1>
            <h5>{{ $user->name }} Returned the {{ $book->name }} book</h5>
            <h3>Thanks, Comeback Later</h3>
            <a class="btn btn-light btn-lg my-4" href="{{ url('/') }}" role="button">Continue</a>
        </div>
    </div>
</div>
@endsection
