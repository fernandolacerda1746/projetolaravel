@extends('templateAdmin.index')

@php

    if (isset($carrinho)) {
        $titulo = 'Alteração de Compra';
        $endpoint = '/carrinho/alterar';
        $input_id = $carrinho['id'];
        $input_usuario = $carrinho['usuario'];
        $input_nome_produto = $carrinho['nome_produto'];
        $input_preco = $carrinho['preco'];
        $input_quantidade = $carrinho['quantidade'];
    }
@endphp

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
    <div class="card">
        <div class="card-header">Sistema de Compras</div>
        <div class="card-body">
            <form method="post" action="{{ $endpoint }}">
                @CSRF
                <input type='hidden' name="id" value="{{ $input_id }}" />

                <label class="form-label">Email do Usuario</label>
                <input class="form-control" name="usuario" placeholder="..." value="{{ $input_usuario }}">
                <label class="form-label">Nome de Produto</label>
                <select class="form-control" name="id_produto">
                    @foreach ($produto as $opcoes)
                        @if ($opcoes['nome'] == $input_nome_produto)
                            <option value="{{ $opcoes['id'] }}" selected>{{ $opcoes['nome'] }}</option>
                        @else
                            <option value="{{ $opcoes['id'] }}">{{ $opcoes['nome'] }}</option>
                        @endif
                    @endforeach
                </select>
                <label class="form-label">Preço</label>
                <input class="form-control" name="preco" placeholder="..." value ="{{ $input_preco }}">
                <label class="form-label">Quantidade</label>
                <input class="form-control" name="quantidade" placeholder="..." value ="{{ $input_quantidade }}">
                <br />
                <input type="submit" class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none;">
            </form>
        </div>
    </div> 
    @endsection 
    <!-- Criar um banco de dados php artisan make:migration create_table_marca -->
