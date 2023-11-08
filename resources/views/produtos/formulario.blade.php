@extends('templateAdmin.index')

@php

    if (isset($produto)) {
        $titulo = 'Alteração de Produto';
        $endpoint = '/produtos/alterar';
        $input_id = $produto['id'];
        $input_nome = $produto['nome'];
        $input_marca = $produto['id_marca'];
        $input_categoria = $produto['id_categoria'];
        $input_preco = $produto['preco'];
        $input_quantidade = $produto['quantidade'];
        $input_descricao = $produto['descricao'];
    }
@endphp

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">{{ $titulo }}</h1>
    <div class="card">
        <div class="card-header">Sistema de Produtos</div>
        <div class="card-body">
            <form method="post" action="{{ $endpoint }}">
                @CSRF
                <input type='hidden' name="id" value="{{ $input_id }}" />

                <label class="form-label">Nome</label>
                <input class="form-control" name="nome" placeholder="..." value="{{ $input_nome }}">
                <label class="form-label">Categoria</label>
                <select class="form-control" name="id_categoria">
                    @foreach ($categorias as $opcoes)
                        @if ($opcoes['id'] == $input_categoria)
                            <option value="{{ $opcoes['id'] }}" selected>{{ $opcoes['nome'] }}</option>
                        @else
                            <option value="{{ $opcoes['id'] }}">{{ $opcoes['nome'] }}</option>
                        @endif
                    @endforeach
                </select>
                <label class="form-label">Marca</label>
                <select class="form-control" name="id_marca">
                    @foreach ($marcas as $opcoes)
                        @if ($opcoes['id'] == $input_marca)
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
                <label class="form-label" style="margin-top: 10px">Descrição</label>
                <div class="container mt-4 mb-4">
                    <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-8">
                            <h1 class="h2 mb-4">Submit issue</h1>
                            <label>Describe the issue in detail</label>
                            <div class="form-group">
                                <textarea id="editor" class="form-control" name="descricao" placeholder="..." value="{{ $input_descricao }}">{{ $input_descricao }}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <br />
                <input type="submit" class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none;">
            </form>
        </div>
    </div> 
    @endsection 
    <!-- Criar um banco de dados php artisan make:migration create_table_marca -->
