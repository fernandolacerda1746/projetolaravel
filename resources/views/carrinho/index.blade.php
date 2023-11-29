@extends('templateShop.index')

@section('contents')
    <div class="card-body">
        <table class="table table-bordered dataTable">
            <thead>
                <td>Produto</td>
                <td>Preço</td>
                <td>Quantidade</td>
            </thead>
            <tbody>
                @foreach ($carrinho as $linha)
                    <tr>
                        <td>{{ $linha['nome_produto'] }}</td>
                        <td>{{ $linha['preco'] }}</td>
                        <td>{{ $linha['quantidade'] }}</td>
                        <td>
                            <a href='{{ route('adicionar.quantidade', ['id' => $linha['id']]) }}' class="btn btn-outline-dark">Adicionar</a>
                            <a href='{{ route('remover.produto', ['id' => $linha['id']]) }}' class="btn btn-outline-dark">Excluir</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
