@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Pages</div>
                    <div class="card-body">
                        <a href="{{ url('/admin/books/create') }}" class="btn btn-success btn-sm" title="Add New Page">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        {!! Form::open(['method' => 'GET', 'url' => '/admin/books', 'class' => 'form-inline my-2 my-lg-0 float-right', 'role' => 'search'])  !!}
                        <div class="input-group">
                            <input type="text" class="form-control" name="search" placeholder="Search..." value="{{ request('search') }}">
                            <span class="input-group-append">
                                <button class="btn btn-secondary" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        {!! Form::close() !!}

                        <br/>
                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>Picture</th>
                                        <th>Name</th>
                                        <th>Total</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($book as $item)
                                    <tr>
                                    <td><img src='{{ asset("img/books/$item->picture") }}' width="50px" alt=""></td>
                                        <td><p class="my-2">{{ $item->name }}</p></td>
                                        <td><p class="my-2">{{ $item->jumlah }}</p></td>
                                        <td>
                                            {{-- <a href="{{ url('/admin/pages/' . $item->id) }}" title="View Page">
                                                <button class="btn btn-info btn-sm my-2">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </button>
                                            </a> --}}
                                            <a href="{{ url('/admin/books/' . $item->id . '/edit') }}" title="Edit Page"><button class="btn btn-primary btn-sm">
                                                <i class="fas fa-pencil-alt" aria-hidden="true"></i>
                                            </button></a>
                                            {!! Form::open([
                                                'method' => 'DELETE',
                                                'url' => ['/admin/books', $item->id],
                                                'style' => 'display:inline'
                                            ]) !!}
                                                {!! Form::button('<i class="fas fa-trash" aria-hidden="true"></i>', array(
                                                        'type' => 'submit',
                                                        'class' => 'btn btn-danger btn-sm',
                                                        'title' => 'Delete Book',
                                                        'onclick'=>'return confirm("Confirm delete?")'
                                                )) !!}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="pagination-wrapper">
                                {!! $book->appends(['search' => Request::get('search')])->render() !!}
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
