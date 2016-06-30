@extends('store.store')

@section('content')
    <div class="container">

        <h3>Administrar Pedidos</h3>

        <table class="table">
            <tbody>
            <tr>
                <th>Pedido</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>

            @foreach($orders as $order)

                <tr>
                    <td><div name="order">{{$order->id}}</div></td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li>{{$item->product->name}}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{$order->total}}</td>
                    <td>
                    <!--{{$order->getStatus()}}-->
                        <select class="status" id="status" onchange="update_status(this)">
                            <option value="0"
                            @if($order->status==0)
                            selected
                            @endif>
                                Pagamento Pendente</option>
                            <option value="1"
                                    @if($order->status==1)
                                    selected
                                    @endif>Pedido Aprovado</option>
                            <option value="2"
                                    @if($order->status==2)
                                    selected
                                    @endif>Finalizado</option>
                        </select>
                    </td>
                </tr>

            @endforeach

            </tbody>
        </table>

    </div>
@stop

@section('javascript')
    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>

    <script>
        function update_status(e) {
            var id_linha = e.parentNode.parentNode.rowIndex;

            var id = document.getElementsByName("order")[id_linha-1].innerHTML;
            //console.log(id);

            var status = $(e).val();
            //console.log(quantity);

            $.ajax({
                method: "GET",
                url: 'orders/' + id + '/' +  status + "/update",
                data: {},
                success: function(result){
                    if(result.success){

                        alert("Status Atualizado!");

                    } else {
                        alert("Erro! Status não atualizado");
                    }
                }
            });
        }
    </script>
@endsection