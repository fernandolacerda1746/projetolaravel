<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Login;
use App\Models\Marca;
use App\Models\Categoria;

class LoginController extends Controller
{
    public function index(){
        $dadosSelect = $this->select();

        return view("login.index",
        [
            'marcas' => $dadosSelect['marcas'],
            'categorias' => $dadosSelect['categorias']
        ]
    );
    }

    public function login(Request $request){
        $email = $request->input('email');
        $senha = $request->input('senha');

        $usuario = Login::where('email', $email)->first();

        if($senha == $usuario->senha){
            Session::put('usuario_email', $usuario->email);
            return redirect('/loja');
        }
        else{
            return redirect('/loja');
        }
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
