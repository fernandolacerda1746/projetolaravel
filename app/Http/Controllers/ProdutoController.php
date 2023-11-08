<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;
use App\Models\Marca;


class ProdutoController extends Controller
{
    public function index()
    {

        $dados = Produto::select("produto.id", "produto.nome", "produto.quantidade AS quantidade", "produto.preco AS preco", "produto.descricao AS descricao", "categoria.nome AS categoria", "marca.nome AS marca")
                 ->join("categoria", "categoria.id","=", "produto.id_categoria")
                 ->join("marca", "marca.id","=", "produto.id_marca")
                 ->get();

        return view(
            "produtos.index",
            [
                'produto' => $dados
            ]
        );
    }

    public function inserir()
    {
        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();
        return view("produtos.inserir", [
            'categorias' => $categorias,
            'marcas' => $marcas]);
    }

    public function novo_produto(Request $request)
    {
        $produto = new Produto();
        $produto->nome = $request->input("nome");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->id_marca = $request->input("id_marca");
        $produto->preco = $request->input("preco");
        $produto->quantidade = $request->input("quantidade");
        $descricao = $request->input("descricao");
        $produto->descricao = $this->removePTags($descricao);
        $produto->save();

        return redirect('/produtos');
    }

    public function alterar($id){

        $categorias = Categoria::all()->toArray();
        $marcas = Marca::all()->toArray();
        $produto = Produto::find($id)->toArray();
        return View('produtos.formulario',[
            'categorias' => $categorias,
            'marcas' => $marcas,
            'produto' => $produto]);
    }

    public function alterar_produto(Request $request){
        $produto = Produto::find($request->input("id"));
        $produto->nome = $request->input("nome");
        $produto->preco = $request->input("preco");
        $produto->id_marca = $request->input("id_marca");
        $produto->id_categoria = $request->input("id_categoria");
        $produto->quantidade = $request->input("quantidade");
        $descricao = $request->input("descricao");
        $produto->descricao = $this->removePTags($descricao);
        $produto->save();
        return redirect("/produtos");
    }

    public function excluir($id){
        $produto = Produto::find($id);
        $produto->delete();
        return redirect("/produtos");
    }

    private function removePTags($content) {
        // Remove as tags <p> abrindo e fechando
        $content = preg_replace('/<p>/', '', $content);
        $content = preg_replace('/<\/p>/', '', $content);
        return $content;
    }
}
