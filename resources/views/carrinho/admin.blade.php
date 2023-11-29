@extends('templateAdmin.index')

@section('contents')
    <div class="card">
        <div class = "card-header">Tabela de Compras</div>
        <div class="card-body">
            <table class="table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td>Usuario</td>
                    <td>Produto</td>
                    <td>Preço</td>
                    <td>Quantidade</td>
                    <td>Opcoes</td>
                </thead>
                <tbody>
                    @foreach ($carrinho as $linha)
                        <tr>
                            <td>{{ $linha['id'] }}</td>
                            <td>{{ $linha['usuario'] }}</td>
                            <td>{{ $linha['nome_produto'] }}</td>
                            <td>{{ $linha['preco'] }}</td>
                            <td>{{ $linha['quantidade'] }}</td>
                            <td>
                                <a href='/carrinho/alterar/{{ $linha['id'] }}' class="btn btn-success">
                                    <li class="fas fa-edit"></li>
                                </a>
                                <a href='/carrinho/excluir/{{ $linha['id'] }}' class="btn btn-danger">
                                    <li class="fas fa-trash"></li>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
