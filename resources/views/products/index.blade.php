@extends('app')

@section('content')
    <div class="container">
        <h1>Products</h1>

        <br>
        <a href="{{ route('product.create') }}" class="btn btn-default">New Product</a>
        <br><br>
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Category</th>
                <th>Action</th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>
                        <a  href="{{ route('product.edit',['id'=>$product->id]) }}">Edit</a> |
                        <a  href="{{ route('product.destroy',['id'=>$product->id]) }}">Delete</a>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $products->render() !!}
    </div>

@endsection