@extends('layouts.frontend')

@section('content')
    <style>
        body {
            background-color: #007bff
        }
    </style>
    <div class="container">
        <div class="row">
            <div class="col-md-8 py-4">
                <div class="shadow p-3 bg-white rounded">
                    <h1 class="my-4"><i class="fas fa-book text-primary"></i> Loan Form</h1>
                    <form id="loan-form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="hidden" name="bookId" id="bookId" class="form-control" value="{{ $book->id }}" aria-describedby="helpId">
                        </div>
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
                        <div class="form-group">
                            <label for="jumlah">Jumlah Buku</label>
                            <input type="number" name="jumlah" id="jumlah" class="form-control" max="{{ $book->jumlah }}" min="1" placeholder="" aria-describedby="helpId">
                        </div>
                        <button class="btn btn-primary px-5 w-100">Borrow</button>
                    </form>
                </div>
            </div>
            <div class="col-4">
                <div class="position-sticky sticky-top" style="top: 30px">
                    <div class="shadow p-3 bg-white rounded">
                        <div class="text-center mb-4">
                            <img src='{{ asset("img/books/$book->picture") }}' height="100px" class="d-inline-block" alt="">
                        </div>
                        <p class="mb-2">{{ $book->name }}</p>
                        <p class="my-2">Pages: {{ $book->total_pages }}</p>
                        <p class="my-2">Prices: {{ $book->price }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function loadFile(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var preview = document.getElementById('preview');
                preview.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

        $('input').attr('required', true);

        $('#loan-form').off().submit(function(e) {
            e.preventDefault();
            let token = $('input[name="_token"]').val();
            $.ajax({
                url: "{{ url('peminjaman')}}",
                type: "POST",
                data: new FormData(this),
                contentType: false,
                cache: false,
                processData: false,
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    if(data.success === true) {
                        alert('Berhasil')
                        setTimeout(function() {
                            window.location.href = "{{ url('check_peminjaman') }}" + '/' + data.transaction.users_id + '/' + data.transaction.code_transaction
                        }, 2500)
                    } else {
                        alert('Gagal')
                    }
                }
            })
        });
    </script>
@endsection
