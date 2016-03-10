@extends('app')

@section('content')
    <div class="container">
        <h1>Create Product</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>'product.store', 'method'=>'post']) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::input('decimal','price', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('featured','Featured:') !!}
                {!! Form::checkbox('featured', true, ['class'=>'form-control']) !!}
                {!! Form::hidden('featured', false) !!}
            </div>

            <div class="form-group">
                {!! Form::label('recommend','Recommend:') !!}
                {!! Form::checkbox('recommend', true, ['class'=>'form-control']) !!}
                {!! Form::hidden('recommend', false) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Product', ['class'=>'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection