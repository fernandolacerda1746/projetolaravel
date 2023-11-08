@extends('templateAdmin.index')

@section('contents')
<h1 class="h3 mb-4 text-gray-800">Categoria Nova</h1>
<div class="card">
    <div class="card-header">Criação de Categorias</div>
    <div class="card-body">
        <form method="post" action="inserir">
            @CSRF
            <label class="form-label">Nome</label>
            <input class="form-control" name="nome" placeholder="...">
            <label class="form-label" style="margin-top: 10px">Situação</label>
            <select class="form-control" name="situacao">
                <option value="0">Inativo</option>
                <option value="1" selected>Ativo</option>
            </select>
            <br />
            <input type="submit" class="btn btn-success" style="background-color: rgb(55, 118, 235); border: none;">
        </form>
    </div>
</div>
@endsection
