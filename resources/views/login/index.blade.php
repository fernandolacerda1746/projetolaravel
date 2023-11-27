@extends('templateShop.index')

@section('contents')
    <form method="post" action="{{ route('login') }}">
        @CSRF
        <label class="form-label" style="margin-left: 40px; margin-top: 10px;">Email</label>
        <input class="form-control" name="email" placeholder="..." style="margin-left: 40px; width:50%;">
        <label class="form-label" style="margin-left: 40px;">Senha</label>
        <input type="password" class="form-control" name="senha" placeholder="..." style="margin-left: 40px; margin-bottom: 10px; width:50%;">
        <input type="submit" class="btn btn-outline-dark" value="Login" style="margin-left: 40px; margin-bottom: 10px;">
    </form>
@endsection
