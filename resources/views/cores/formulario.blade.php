@extends('templateAdmin.index')

@php

    if (isset($cor)) {
        $titulo = 'Alteração de Cores';
        $endpoint = '/cores/alterar';
        $input_id = $cor['id'];
        $input_cor = $cor['cor'];

    }
@endphp

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
    <div class="card">
        <div class="card-header">Sistema de Categorias</div>
        <div class="card-body">
            <form method="post" action="{{ $endpoint }}">
                @CSRF
                <input type='hidden'
                       name="id"
                       value="{{ $input_id }}" />

                <label class="form-label">Cor</label>
                <input class="form-control" name="cor" placeholder="..." value="{{ $input_cor}}">
                <label class="form-label" style="margin-top: 10px">Situação</label>
                <select class="form-control" name="situacao">
                    <option value="0">Inativo</option>
                    <option value="1" selected>Ativo</option>
                </select>
                <br/>
                <input type="submit" class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none;">
            </form>
        </div>
    </div>
@endsection

<!--
    Criar um banco de dados
    php artisan make:migration create_table_marca
-->
