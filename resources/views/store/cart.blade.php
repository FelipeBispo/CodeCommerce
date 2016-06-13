
@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="description"></td>
                            <td class="price">Price</td>
                            <td class="price">Qtd</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($cart->all() as $k=>$item)
                            <tr>
                                <td class="cart_product">
                                    <a href="{{  route('store.product',['id'=>$k]) }}">
                                        Imagem
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <h4><a href="#">{{ $item['name'] }}</a> </h4>
                                    <p name="id_produto">Codigo: {{$k}}</p>
                                </td>
                                <td class="cart_price">
                                    R$ {{$item['price']}}
                                </td>

                                <td class="cart_quantity">
                                    <input type="number" min="1" id="quantity_products" value="{{$item['qtd']}}" onchange="update_quantity(this)">

                                </td>

                                <td class="cart_total">
                                    <p name="cart_total_price" class="cart_total_price">{{$item['price']*$item['qtd']}}</p>
                                </td>

                                <td class="cart_delete">
                                    <a href="{{ route('cart.destroy',['id'=>$k]) }}" class="cart_quantity_delete">Delete</a>
                                </td>
                            </tr>
                        @empty

                            <tr>
                                <td class="" colspan="6">
                                    <p> Nenhum item encontrado.</p>
                                </td>
                            </tr>
                        @endforelse

                        <tr class="cart_menu">
                            <td colspan="6">
                                <div class="pull-right">
                                    <span id ="total_price" style="margin-right: 110px">
                                        Total: R$ {{ $cart->getTotal() }}
                                    </span>

                                    <a href="{{ route('checkout.place') }}" class="btn btn-success">Fechar a conta</a>

                                </div>
                            </td>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop

@section('javascript')

    <script>
        function update_quantity(e) {
            var id_linha = e.parentNode.parentNode.rowIndex;

            var id = document.getElementsByName("id_produto")[id_linha-1].innerHTML.replace('Codigo: ','');
            //console.log(id);

            var quantity = $(e).val();
            //console.log(quantity);

            $.ajax({
                method: "GET",
                url: "cart/update/" + id + '/' +  quantity,
                data: {},
                success: function(result){
                    if(result.success){

                        document.getElementsByName("cart_total_price")[id_linha-1].innerHTML= 'R$' + result.price;
                        document.getElementById("total_price").innerHTML= 'R$' + result.total;

                    } else {
                    alert("Erro! Erro na atualizacao do carrinho.");
                    }
                }
            });
        }
    </script>

@stop