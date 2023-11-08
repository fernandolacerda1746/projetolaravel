@extends('templateAdmin.index')

@section('contents')

    <!--Tabela de Produtos-->
    <div class="card">
        <div class = "card-header">Tabela de Produtos</div>
        <div class="card-body">
            <a href='/produtos/inserir' class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none; margin-bottom: 5px">
                Novo
            </a>
            <table class="table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Marca</td>
                    <td>Categoria</td>
                    <td>Preço</td>
                    <td>Quantidade</td>
                    <td>Descrição</td>
                    <td>Opções</td>
                </thead>
                <tbody>
                    @foreach ($produto as $linha)
                        <tr>
                            <td>{{ $linha['id'] }}</td>
                            <td>{{ $linha['nome'] }}</td>
                            <td>{{ $linha['marca'] }}</td>
                            <td>{{ $linha['categoria'] }}</td>
                            <td>{{ $linha['preco'] }}</td>
                            <td>{{ $linha['quantidade'] }}</td>
                            <td>{{ $linha['descricao'] }}</td>
                            <td>
                                <a href='/produtos/alterar/{{ $linha['id'] }}' class="btn btn-success">
                                    <li class="fas fa-edit"></li>
                                </a>
                                <a href='/produtos/excluir/{{ $linha['id'] }}' class="btn btn-danger">
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


<!--
    Criar um banco de dados
    php artisan make:migration 'Nome da tabela'
-->

<!--
    Criar um controller
    php artisan make:controller 'Nome do Controller'
-->

<!--
    Criar um model
    php artisan make:model 'Nome do Model'
-->
