<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Models\Marca;
use App\Models\Categoria;

class LojaController extends Controller
{
    public function index()
    {
        $dadosSelect = $this->select();

        $dados = Produto::select("produto.id", "produto.nome", "produto.quantidade AS quantidade", "produto.preco AS preco", "produto.descricao AS descricao", "categoria.nome AS categoria", "marca.nome AS marca")
            ->join("categoria", "categoria.id", "=", "produto.id_categoria")
            ->join("marca", "marca.id", "=", "produto.id_marca")
            ->get();

        return view(
            "loja.index",
            [
                'produto' => $dados,
                'marcas' => $dadosSelect['marcas'],
                'categorias' => $dadosSelect['categorias']
            ]
        );
    }

    public function consultamarca($id){
        
        $dadosSelect = $this->select();

        $dados = Produto::select("produto.id", "produto.nome", "produto.quantidade AS quantidade", "produto.preco AS preco", "produto.descricao AS descricao", "categoria.nome AS categoria", "marca.nome AS marca")
            ->join("categoria", "categoria.id", "=", "produto.id_categoria")
            ->join("marca", "marca.id", "=", "produto.id_marca")
            ->where("marca.id", $id)
            ->get();

        return view(
            "loja.index",
            [
                'produto' => $dados,
                'marcas' => $dadosSelect['marcas'],
                'categorias' => $dadosSelect['categorias']
            ]
        );
    }

    public function consultacategoria($id){
        
        $dadosSelect = $this->select();

        $dados = Produto::select("produto.id", "produto.nome", "produto.quantidade AS quantidade", "produto.preco AS preco", "produto.descricao AS descricao", "categoria.nome AS categoria", "marca.nome AS marca")
            ->join("categoria", "categoria.id", "=", "produto.id_categoria")
            ->join("marca", "marca.id", "=", "produto.id_marca")
            ->where("categoria.id", $id)
            ->get();

        return view(
            "loja.index",
            [
                'produto' => $dados,
                'marcas' => $dadosSelect['marcas'],
                'categorias' => $dadosSelect['categorias']
            ]
        );
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
