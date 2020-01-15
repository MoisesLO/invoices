<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Auth;
use App\Empresa;
use App\Usuario;
use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
    public function registrar (Request $request){
//        try {

            $request->validate([
                'ruc' => ['required','unique:empresas' , 'max:11'],
                'email' => ['required', 'unique:usuarios', 'max:255'],
            ]);


            /* Create Empresa */
            $empresa = new Empresa();
            $empresa->ruc = $request->ruc;
            $empresa->razon_social = $request->razon_social;
            $empresa->save();

            $usuario = new Usuario;
            $usuario->email = $request->email;
            $usuario->password = bcrypt($request->password);
            $usuario->empresa_id = $empresa->id;
            $usuario->save();

//        }catch (\Exception $e){
//            return response()->json($e->errorInfo[2],401);
//        }

    }

    public function login (Request $request){
        $credentials = $request->only('elnaufrago2009@gmail.com', 'moiseslinar3s');
        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }else{
            return response()->json('error');
        }
    }

    public function datos (){


        return response()->json(Empresa::all());
//        return view('auth/register');
    }
}
