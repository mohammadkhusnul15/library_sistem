@extends('layouts.frontend')

@section('content')
<style>
    body {
        background-color: #007bff
    }
</style>
<div class="container py-4">
    <div class="row">
        <div class="col-md-8 bg-white shadow rounded py-3">
            <h1 class="my-4"><i class="fas fa-book text-primary"></i> Loan Form</h1>
            <form id="loan-form" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="hidden" required name="loanCode" id="loanCode" class="form-control" value="{{ $transaction->code_transaction }}" placeholder="Your Awesome Name" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="hidden" required name="userId" id="userId" class="form-control" value="{{ $user->id }}" placeholder="Your Awesome Name" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <input type="hidden" required name="bookId" id="bookId" class="form-control" value="{{ $book->id }}" placeholder="Your Awesome Name" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" required name="name" id="name" class="form-control" value="{{ $user->name }}" placeholder="Your Awesome Name" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" required name="email" id="email" value="{{ $user->email }}" class="form-control" placeholder="example@domain.com" aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="" aria-describedby="helpId">
                    <small class="text-info">* Type for change your password</small>
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
                            <input type="text" required name="phone" id="phone" value="{{ $user->phone_number }}" class="form-control" placeholder="8xx-xxxx-xxxx" aria-describedby="helpId">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="class">Your Class</label>
                            <select required name="class" id="class" class="form-control">
                                <option value="{{ $user->class }}">{{ $user->class }}</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label for="major">Your Major</label>
                            <select required name="major" id="major" class="form-control">
                                <option value="{{ $user->majors }}">{{ $user->majors }}</option>
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
                    <textarea name="address" id="address" required cols="30" class="form-control" rows="5" placeholder="(Kec)-(Kab)-(Prov)">{{ $user->address }}</textarea>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="picture">Upload your Awesome Picture</label>
                            <input type="file" id="picture" name="picture" onchange="loadFile(event)">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <img src='{{ asset("img/user/$user->picture") }}'' class="my-4 rounded" id="preview" alt="preview" width="75%">
                    </div>
                </div>
                <div class="form-group">
                    <label for="jumlah">Jumlah Buku</label>
                    <input type="number" name="jumlah" id="jumlah" value="{{ $transaction->jumlah }}" class="form-control" max="{{ $book->jumlah }}" min="1" placeholder="" aria-describedby="helpId">
                </div>
                <button class="btn btn-success px-5 w-100 d-none" id="btn_update">Update</button>
                <div class="btn-group w-100" id="btn-tools">
                    <button class="btn btn-danger px-5" type="button" id="btn_cancel">Cancel</button>
                    <button class="btn btn-success px-5" type="button" id="btn_edit">Edit</button>
                <a class="btn btn-primary px-5" type="button" id="btn_borrow" onclick="return confirm('Yakin ?')" href='{{ url("kode/peminjaman/$transaction->code_transaction") }}'>Borrow</a>
                </div>

            </form>
        </div>
        <div class="col-4">
            <div class="position-sticky sticky-top">
                <div class="shadow p-3 bg-white rounded">
                    <div class="text-center mb-4">
                        <img src='{{ asset("img/books/$book->picture") }}' height="100px" class="d-inline-block" alt="">
                    </div>
                    <p class="mb-2">{{ $book->name }}</p>
                    <p class="my-2">Pages: {{ $book->total_pages }}</p>
                    <p class="my-2">Prices: {{ $book->price }}</p>
                    <p class="my-2 font-weight-bold">Your Loan Code</p>
                    <div class="alert alert-info" role="alert">
                        <strong>{{ $transaction->code_transaction }}</strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    let token = $('input[name="_token"]').val();
    let userId = $('input[name="userId"]').val();
    let bookId = $('input[name="bookId"]').val();
    let loanCode = $('input[name="loanCode"]').val();
    $('document').ready(function() {
        $('input, textarea, select').attr('disabled', true);
    });
    $('#btn_edit').click(function() {
        $('input, textarea, select').attr('disabled', false);
        $('#btn-tools').addClass('d-none');
        $('#btn_update').removeClass('d-none');
    });

    $('#btn_cancel').click(function(e) {
        e.preventDefault();
        var tanya = confirm('Yakin ?');
        if(tanya === true) {
            $.ajax({
                url: "{{ url('peminjaman') }}" + "/" + userId,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': token
                },
                success: function(data) {
                    if(data.success === true) {
                        alert('Cancelled');
                        setTimeout(function() {
                            window.location.href = "{{ url('/') }}"
                        }, 1500);
                    }
                }
            });
        }
    });
    function loadFile(event) {
        var reader = new FileReader();
        reader.onload = function() {
            var preview = document.getElementById('preview');
            preview.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    $('#loan-form').off().submit(function(e) {
        e.preventDefault();
        $.ajax({
            url: "{{ url('peminjaman') }}" + "/" + userId,
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
                        $('input, textarea, select').attr('readonly', true);
                        $('#btn-tools').removeClass('d-none');
                        $('#btn_update').addClass('d-none');
                    }, 1500)
                } else {
                    alert(data.message)
                }
            }
        })
    });
</script>

@endsection
