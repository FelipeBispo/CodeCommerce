<h1>Lista de Produtos</h1>

<ul>
    @foreach($products as $product)
        <li>{{ $product->name  }}</li>
    @endforeach
</ul>