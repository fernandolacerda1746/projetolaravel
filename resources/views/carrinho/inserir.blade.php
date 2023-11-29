@extends('templateAdmin.index')

@section('contents')
    <h1 class="h3 mb-4 text-gray-800">Cadastro de Compras</h1>
    <div class="card">
        <div class="card-header">Cadastro de Compras</div>
        <div class="card-body">
            <form method="post" action="inserir">
                @CSRF
                <label class="form-label">Email do Usuario</label>
                <input class="form-control" name="usuario" placeholder="...">
                <label class="form-label">Nome do Produto</label>
                <select class="form-control" name="nome_produto">
                    @foreach ($produto as $opcoes)
                        <option value="{{ $opcoes['id'] }}">{{ $opcoes['nome'] }}</option>
                    @endforeach
                </select>
                <label class="form-label">Preço</label>
                <input class="form-control" name="preco" placeholder="...">
                <label class="form-label">Quantidade</label>
                <input class="form-control" name="quantidade" placeholder="...">
                <br />
                <input type="submit" class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none;">
            </form>
        </div>
    </div>

@endsection
