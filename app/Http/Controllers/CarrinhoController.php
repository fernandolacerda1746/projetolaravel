<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Carrinho;
use App\Models\Produto;

class CarrinhoController extends Controller
{

    public function index()
    {

        $dados = Carrinho::all()->toArray();
        return view(
            "carrinho.index",
            [
                'carrinho' => $dados
            ]
        );
    }

    public function inserir_produto(){
        
    }

    
}
