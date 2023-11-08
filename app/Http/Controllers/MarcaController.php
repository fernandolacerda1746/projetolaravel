<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

class MarcaController extends Controller
{
    public function index(){

        $dados = Marca::all()->toArray();
        return view("marcas.index",
        [
            'marca' => $dados
        ]
    );
    }

    public function inserir(){
        return view("marcas.inserir"); //"link" para o formulário inserir
    }

    public function nova_marca(Request $request){

        $marca = new Marca;
        $marca->nome = $request->input("nome");
        $marca->nome_fantasia = $request->input("nome_fantasia");
        $marca->situacao = $request->input("situacao");
        $marca->save();

        return redirect("/marcas");

        /*echo $request->input("nome");
        echo $request->input("nome_fantasia");
        echo $request->input("situacao");
        exit;*/
    }

    public function excluir($id){
        $marca = Marca::find($id);
        $marca->delete();
        return redirect("/marcas");
    }

    public function alterar($id){
       $marca = Marca::find($id)->toArray();
       return View('marcas.formulario',['marca'=>$marca]);
    }

    public function alterar_marca(Request $request){
        $marca = Marca::find($request->input("id"));
        $marca->nome = $request->input("nome");
        $marca->nome_fantasia = $request->input("nome_fantasia");
        $marca->situacao = $request->input("situacao");
        $marca->save();
        return redirect("/marcas");
    }

}
