@extends('templateAdmin.index')

@section('contents')

<div class="card">
    <div class = "card-header">Tabela de Marcas</div>
    <div class="card-body">
        <a href='marcas/inserir' class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none; margin-bottom: 5px">
            Novo
        </a>
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
                        <td>{{ $linha['nome_produto'] }}</td>
                        <td>{{ $linha['usuario'] }}</td>
                        <td>{{ $linha['preco'] }}</td>
                        <td>{{ $linha['quantidade'] }}</td>
                        <td>
                            <a href='/marcas/alterar/{{ $linha['id'] }}' class="btn btn-success">
                                <li class="fas fa-edit"></li>
                            </a>
                            <a href='/marcas/excluir/{{$linha['id']}}' class="btn btn-danger">
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

