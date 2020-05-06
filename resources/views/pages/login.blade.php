@extends('layouts.frontend')

@section('content')
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-md-6 py-5 my-5 offset-md-3">
                <div class="shadow rounded bg-white w-100 py-4 px-4">
                    <h2 class="text-center"><i class="fas fa-book text-primary"></i> Login</h2>
                    <form id="form-login">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-primary w-100 px-5">Login</button>
                    </form>
                    {{-- <hr> --}}
                    {{-- <a class="btn btn-light w-100 px-5" href="{{ url('register') }}" role="button">Register</a> --}}
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white footer position-absolute footer-home mb-3">
        <i class="fas fa-toolbox text-primary"></i> Developed by <a href="https://www.instagram.com/muhammad_khusnul_khuluq/">Ninno</a> & <a href="https://www.instagram.com/nisaaputtry/">Anisa</a>
    </div>

    <script>
        let token = $('input[name="_token"]').val();
        $('#form-login').off().submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: "{{ url('login') }}",
                type: "POST",
                data: new FormData(this),
                cache: false,
                processData: false,
                contentType: false,
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    if(data.success === true) {
                        alert('Berhasil');
                        setTimeout(function() {
                            window.location.href = "{{ url('admin') }}"
                        }, 1000)
                    } else {
                        alert('Gagal');
                    }
                }
            });
        });
    </script>
@endsection
