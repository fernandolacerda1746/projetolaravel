<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cor;

class CorController extends Controller
{
    public function index(){

        $dados = Cor::all()->toArray();
        return view("cores.index",
        [
            'cor' => $dados
        ]
    );
    }

    public function inserir(){
        return view("cores.inserir");
    }

    public function nova_cor(Request $request){

        $cor = new Cor;
        $cor->cor = $request->input("cor");
        $cor->situacao = $request->input("situacao");
        $cor->save();

        return redirect("/cores");

        /*echo $request->input("nome");
        echo $request->input("nome_fantasia");
        echo $request->input("situacao");
        exit;*/
    }

    public function excluir($id){
        $cor = Cor::find($id);
        $cor->delete();
        return redirect("/cores");
    }

    public function alterar($id){
        $cor = Cor::find($id)->toArray();
        return View('cores.formulario',['cor'=>$cor]);
     }

     public function alterar_cor(Request $request){
         $cor = Cor::find($request->input("id"));
         $cor->cor = $request->input("cor");
         $cor->situacao = $request->input("situacao");
         $cor->save();
         return redirect("/cores");
     }
}
