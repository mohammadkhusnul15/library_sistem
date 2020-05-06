@extends('layouts.frontend')

@section('content')
<style>
    body {
        background-color: #007bff;
    }
</style>
    <div class="container my-5 py-5">
        <div class="row my-5 py-5">
            <div class="col-md-8 offset-md-2 p-3 bg-white card-icon">
                <div class="position-relative">
                    <div class="text-center">
                        <p class="my-2">Dear {{ $user->name }}</p>
                        <h2 class="font-weight-bold">Always Remember Your Loan Code</h2>
                    </div>
                    <div class="row ">
                        <div class="col-md-10 offset-md-1">
                            <div class="alert alert-info" role="alert">
                                <strong>{{ $transaction->code_transaction }}</strong>
                            </div>
                            <div class="text-right">
                                <div class="btn-group w-50">
                                    <a href='{{ url("pdf/peminjaman/$transaction->code_transaction") }}' target="_blank" class="btn btn-light border-primary">Print</a>
                                    <a href="{{ url('/') }}" role="button" class="btn btn-primary">Done</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
