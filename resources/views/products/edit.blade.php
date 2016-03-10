@extends('app')

@section('content')
    <div class="container">
        <h1>Editing Product {{ $product->name }}</h1>

        @if($errors->any())
            <ul class="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route'=>['product.update', $product->id], 'method'=>'put']) !!}

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name', $product->name, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('description','Description:') !!}
                {!! Form::textarea('description', $product->description, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('price','Price:') !!}
                {!! Form::input('decimal','price', $product->price, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('featured','Featured:') !!}
                {!! Form::checkbox('featured',1, $product->featured) !!}
                {!! Form::hidden('featured', 0) !!}
            </div>

            <div class="form-group">
                {!! Form::label('recommend','Recommend:') !!}
                {!! Form::checkbox('recommend',1, $product->recommend) !!}
                {!! Form::hidden('recommend', 0) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Add Product', ['class'=>'btn btn-primary form-control']) !!}
            </div>

        {!! Form::close() !!}
    </div>

@endsection