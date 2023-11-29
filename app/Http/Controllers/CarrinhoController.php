<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Produto;
use App\Models\Marca;
use App\Models\Categoria;


class CarrinhoController extends Controller
{
    //Funções do Administrador
    public function index()
    {

        $dados = Carrinho::all()->toArray();
        return view(
            "carrinho.admin",
            [
                'carrinho' => $dados
            ]
        );
    }

    public function alterar($id){

        
        $produto = Produto::all()->toArray();
        $carrinho = Carrinho::find($id)->toArray();
        return View('carrinho.formulario',[
            'carrinho' => $carrinho,
            'produto' => $produto
            
        ]);
    }

    public function alterar_carrinho(Request $request){

        $carrinho = Carrinho::find($request->input("id"));
        $carrinho->usuario = $request->input("usuario");
        $carrinho->nome_produto = $request->input("nome_produto");
        $carrinho->preco = $request->input("preco");
        $carrinho->quantidade = $request->input("quantidade");
        
        return redirect("/carrinho/admin");
    }

    public function excluir($id){
        $carrinho = Carrinho::find($id);
        $carrinho->delete();
        return redirect("/carrinho/admin");
    }

    //Funções da Loja
    public function produtos_cliente()
    {
        $dadosSelect = $this->select();

        $dados = Carrinho::all()->where('usuario', session('usuario_email'));

        return view(
            "carrinho.index",
            [
                'carrinho' => $dados,
                'marcas' => $dadosSelect['marcas'],
                'categorias' => $dadosSelect['categorias']
            ]
        );
    }

    public function add_produto($id)
    {

        $produto = Produto::find($id);
        $usuario = session('usuario_email');

        if (!$produto) {
            return redirect('/carrinho');
        }

        if (!$usuario) {
            return redirect('/login');
        }

        $carrinho = Carrinho::where('usuario', $usuario)->where('nome_produto', $produto->nome)->first();

        if (!$carrinho) {
            $carrinho = new Carrinho();
            $carrinho->usuario = $usuario;
            $carrinho->nome_produto = $produto->nome;
            $carrinho->preco = $produto->preco;
            $carrinho->quantidade = 1;
            $carrinho->save();
        } else {
            $carrinho->increment('quantidade');
        }

        return redirect('/carrinho');
    }



    public function add_quantidade($id){
        
        $carrinho = Carrinho::find($id);
        $carrinho->increment('quantidade');

        return redirect('/carrinho');

    }

    public function remove_produto($id){

        $carrinho = Carrinho::find($id);
        $carrinho->delete();

        return redirect('/carrinho');

    }

    public function calcularTotalCompras()
    {
        $itensCarrinho = Carrinho::all()->where('usuario',session('usuario_email'));

        $total = 0;

        foreach ($itensCarrinho as $item) {
            $total += $item->preco * $item->quantidade;
        }

        return $total;
    }

    private function select()
    {
        $marcas = Marca::all()->toArray();
        $categorias = Categoria::all()->toArray();
        return [
            'marcas' => $marcas,
            'categorias' => $categorias
        ];
    }
}
