<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index(){

        $dados = Categoria::all()->toArray();
        return view("categorias.index",
        [
            'categoria' => $dados
        ]
        );
    }

    public function inserir(){
        return view("categorias.inserir");
    }

    public function nova_categoria(Request $request){

        $categoria = new Categoria;
        $categoria->nome = $request->input("nome");
        $categoria->situacao = $request->input("situacao");
        $categoria->save();

        return redirect("/categorias");

    }

    public function excluir($id){
        $categoria = Categoria::find($id);
        $categoria->delete();
        return redirect("/categorias");
    }

    public function alterar($id){
        $categoria = Categoria::find($id)->toArray();
        return View('categorias.formulario',['categoria'=>$categoria]);
     }

     public function alterar_categoria(Request $request){
         $categoria = Categoria::find($request->input("id"));
         $categoria->nome = $request->input("nome");
         $categoria->situacao = $request->input("situacao");
         $categoria->save();
         return redirect("/categorias");
     }
}
