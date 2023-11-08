@extends('templateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Produto Novo</h1>
    <div class="card">
        <div class="card-header">Cadastro de Produtos</div>
        <div class="card-body">
            <form method="post" action="inserir">
                @CSRF
                <label class="form-label">Nome do Produto</label>
                <input class="form-control" name="nome" placeholder="...">
                <label class="form-label">Categoria</label>
                <select class="form-control" name="id_categoria">
                    @foreach ($categorias as $opcoes)
                        <option value="{{ $opcoes['id'] }}">{{ $opcoes['nome'] }}</option>
                    @endforeach
                </select>
                <label class="form-label">Marca</label>
                <select class="form-control" name="id_marca">
                    @foreach ($marcas as $opcoes)
                        <option value="{{ $opcoes['id'] }}">{{ $opcoes['nome'] }}</option>
                    @endforeach
                </select>
                <label class="form-label">Preço</label>
                <input class="form-control" name="preco" placeholder="...">
                <label class="form-label">Quantidade</label>
                <input class="form-control" name="quantidade" placeholder="...">
                <label class="form-label" style="margin-top: 10px">Descrição</label>
                <div class="container mt-4 mb-4">
                    <!--Bootstrap classes arrange web page components into columns and rows in a grid -->
                    <div class="row justify-content-md-center">
                        <div class="col-md-12 col-lg-8">
                            <h1 class="h2 mb-4">Submit issue</h1>
                            <label>Describe the issue in detail</label>
                            <div class="form-group">
                                <textarea id="editor" name="descricao"></textarea>
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
