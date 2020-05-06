@extends('layouts.frontend')

@section('content')
    <div class="container-fluid">
        <div class="row py-5">
            <div class="col-md-6 offset-md-3">
                <div class="shadow rounded bg-white w-100 py-4 px-4">
                    <h2 class="text-center"><i class="fas fa-book text-primary"></i> Register</h2>
                    <form id="form-register" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Your Awesome Name" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email" class="form-control" placeholder="example@domain.com" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="password2">Confirm Password</label>
                            <input type="password" name="password2" id="password2" class="form-control" placeholder="" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone / Whatsapp</label>
                            <div class="row">
                                <div class="col-2">
                                    <div class="d-flex mt-2 mx-2">
                                        <img src="{{ asset('img/icon/indo.icon.png') }}" class="mx-2" width="20px" height="20px" alt="">
                                        <p>+62</p>
                                    </div>
                                </div>
                                <div class="col-10">
                                    <input type="text" name="phone" id="phone" class="form-control" placeholder="8xx-xxxx-xxxx" aria-describedby="helpId">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="class">Your Class</label>
                                    <select name="class" id="class" class="form-control">
                                        <option value="">Choose Class</option>
                                        <option value="10">10</option>
                                        <option value="11">11</option>
                                        <option value="12">12</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="major">Your Major</label>
                                    <select name="major" id="major" class="form-control">
                                        <option value="">Choose Your Major</option>
                                        <option value="RPL">RPL (Rekayasa Perangkat Lunak)</option>
                                        <option value="MM">MM (MultiMedia)</option>
                                        <option value="TKJ">TKJ (Teknik Komputer Jaringan)</option>
                                        <option value="MKT">MKT (Mekatronika)</option>
                                        <option value="TPM">TPM (Teknik Pemesinan)</option>
                                        <option value="TPBO">TPBO (Teknik Body Otomotif)</option>
                                        <option value="TKR">TKR (Teknik Kendaraan Ringan)</option>
                                        <option value="TL">TL (Teknik Las)</option>
                                        <option value="APHP">APHP (Agribisnis Pengolahan Hasil Pangan)</option>
                                        <option value="ATPH">ATPH (Agribisnis Tanam Pangan dan Hortikultura)</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="address" cols="30" class="form-control" rows="5" placeholder="(Kec)-(Kab)-(Prov)"></textarea>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="picture">Upload your Awesome Picture</label>
                                    <input type="file" id="picture" name="picture" onchange="loadFile(event)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <img src="{{ asset('img/user/dummy_1234.png') }}" class="my-4 rounded" id="preview" alt="preview" width="75%">
                            </div>
                        </div>
                        <button class="btn btn-primary w-100 px-5">Register</button>
                    </form>
                    <hr>
                    <a class="btn btn-light w-100 px-5" href="{{ url('login') }}" role="button">Login</a>
                </div>
            </div>
        </div>
    </div>

    <script>
        let token = $('input[name="_token"]').val();
        function loadFile(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('input').attr('required', true);

        $('#form-register').off().submit(function(e) {
            e.preventDefault();
            $.ajax({
                url: '{{ url("admin/smknusa/library/register") }}',
                type: 'POST',
                data: new FormData(this),
                dataType: 'JSON',
                headers: {
                    'X-CSRF-TOKEN': token,
                },
                cache: false,
                processData: false,
                contentType: false,
                success: function(data) {
                    if(data.success === true) {
                        alert('berhasil');
                        setTimeout(function() {
                            window.location.href = "{{ url('login') }}"
                        }, 1500);
                    } else {
                        alert('Gagal');
                    }
                }
            })
        });

    </script>
@endsection
