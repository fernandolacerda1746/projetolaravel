@extends('templateAdmin.index')

@php
    /*$titulo = 'Alteração de marca';
    $endpoint = '/marca/novo';
    $input_nome = '';
    $input_nome_fantasia = '';*/

    if (isset($marca)) {
        $titulo = 'Alteração de marca';
        $endpoint = '/marcas/alterar';
        $input_id = $marca['id'];
        $input_nome = $marca['nome'];
        $input_nome_fantasia = $marca['nome_fantasia'];
    }
@endphp

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
    <div class="card">
        <div class="card-header">Sistema de Marcas</div>
        <div class="card-body">
            <form method="post" action="{{$endpoint}}">
                @CSRF
                <input type='hidden'
                       name="id"
                       value="{{$input_id}}"/>

                <label class="form-label">Nome</label>
                <input class="form-control" name="nome" placeholder="..." value="{{ $input_nome }}">
                <label class="form-label" style="margin-top: 10px">Nome Fantasia</label>
                <input class="form-control" name="nome_fantasia" placeholder="..." value="{{ $input_nome_fantasia }}">
                <label class="form-label" style="margin-top: 10px">Situação</label>
                <select class="form-control" name="situacao">
                    <option value="0">Inativo</option>
                    <option value="1" selected>Ativo</option>
                </select>
                <br />
                <input type="submit" class="btn btn-success" placeholder="Novo" style="background-color: rgb(55, 118, 235); border: none;">
            </form>
        </div>
    </div>
@endsection

<!--
    Criar um banco de dados
    php artisan make:migration create_table_marca
-->
