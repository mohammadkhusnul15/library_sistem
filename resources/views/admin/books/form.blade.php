<div class="form-group{{ $errors->has('name') ? 'has-error' : ''}}">
    {!! Form::label('name', 'Name', ['class' => 'control-label']) !!}
    {!! Form::text('name', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('jumlah') ? 'has-error' : ''}}">
    {!! Form::label('jumlah', 'Total', ['class' => 'control-label']) !!}
    {!! Form::number('jumlah', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group my-5">
            <label for="picture">Picture</label>
            <input type="file" name="picture" onchange="loadFile(event)" id="picture" class="form-control" aria-describedby="helpId">
            <small>* Optional when update</small>
        </div>
    </div>
    <div class="col-6 text-center">
        <img src="{{ asset('img/books/dummy.png') }}" id="preview" alt="book_image" class="w-50 rounded">
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
</script>

<div class="form-group{{ $errors->has('author') ? 'has-error' : ''}}">
    {!! Form::label('author', 'Author', ['class' => 'control-label']) !!}
    {!! Form::text('author', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="form-group{{ $errors->has('publisher') ? 'has-error' : ''}}">
    {!! Form::label('publisher', 'Publisher', ['class' => 'control-label']) !!}
    {!! Form::text('publisher', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
    {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
</div>
<div class="row">
    <div class="col-4">
        <div class="form-group{{ $errors->has('publication_year') ? 'has-error' : ''}}">
            {!! Form::label('publication_year', 'Year', ['class' => 'control-label']) !!}
            {!! Form::text('publication_year', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group{{ $errors->has('rack') ? 'has-error' : ''}}">
            {!! Form::label('rack', 'Rack', ['class' => 'control-label']) !!}
            {!! Form::text('rack', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group{{ $errors->has('stack') ? 'has-error' : ''}}">
            {!! Form::label('stack', 'Stack', ['class' => 'control-label']) !!}
            {!! Form::text('stack', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6">
        <div class="form-group{{ $errors->has('total_pages') ? 'has-error' : ''}}">
            {!! Form::label('total_pages', 'Total pages', ['class' => 'control-label']) !!}
            {!! Form::text('total_pages', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
    <div class="col-6">
        <div class="form-group{{ $errors->has('price') ? 'has-error' : ''}}">
            {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
            {!! Form::text('price', null, ('required' == 'required') ? ['class' => 'form-control', 'required' => 'required'] : ['class' => 'form-control']) !!}
            {!! $errors->first('title', '<p class="help-block">:message</p>') !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!! Form::submit($formMode === 'edit' ? 'Update' : 'Create', ['class' => 'btn btn-primary']) !!}
</div>
