@extends('templateShop.index')

@section('contents')

<section class="py-5">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Marca</th>
                <th scope="col">Categoria</th>
                <th scope="col">Preço</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($produto as $linha)
                <tr>
                    <td>{{ $linha['nome'] }}</td>
                    <td>{{ $linha['marca'] }}</td>
                    <td>{{ $linha['categoria'] }}</td>
                    <td>{{ number_format($linha['preco']) }}</td>
                    <td><a class="btn btn-outline-dark" href="#">Add to cart</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</section>

@endsection