@extends('templateAdmin.index')

@section('contents')

    <!--Tabela de Marcas-->
    <div class="card">
        <div class = "card-header">Tabela de Marcas</div>
        <div class="card-body">
            <a href='marcas/inserir' class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none; margin-bottom: 5px">
                Novo
            </a>
            <table class="table table-bordered dataTable">
                <thead>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Nome Fantasia</td>
                    <td>Situação</td>
                    <td>Opções</td>
                </thead>
                <tbody>
                    @foreach ($marca as $linha)
                        <tr>
                            <td>{{ $linha['id'] }}</td>
                            <td>{{ $linha['nome'] }}</td>
                            <td>{{ $linha['nome_fantasia'] }}</td>
                            <td>{{ $linha['situacao'] }}</td>
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


<!--
    Criar um banco de dados
    php artisan make:migration create_table_marca
-->
