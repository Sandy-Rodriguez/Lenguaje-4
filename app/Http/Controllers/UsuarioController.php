<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\DB; 
use Illuminate\Validation\Rule;


class UsuarioController extends Controller
{
    
    public function index(Request $request)
    {
        $UsuarioBuscar=$request->get('buscar');
        $usuarios=DB::table('usuarios')
                    ->select('id','nombre','correo_electronico')
                    ->where('nombre', 'LIKE', '%'.$UsuarioBuscar.'%')
                    ->orwhere('correo_electronico', 'LIKE', '%'.$UsuarioBuscar.'%')        

                    ->paginate(10);
        return view ('Usuario.UIndex', compact('usuarios','UsuarioBuscar'));
    
        $usuarios = Usuario::paginate(20);
        return view('Usuarios.UIndex', compact('usuarios'));
 
    }

   
    public function create()
    {
        return view('Usuario.UCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico'=>'required|unique:usuarios|Email',


        ]);
        
        $usuario = new Usuario();
        $usuario->nombre=$request->input('nombre');
        $usuario->correo_electronico=$request->input('correo_electronico');



        if ($usuario->save()){
         $mensaje = "El usuario se creo exitosamente"; 
        }
        
        else{
          $mensaje = "El usuario no se creo exitosamente"; 
        }

        return redirect()->route('usuario.index')->with('mensaje',$mensaje);
    }
    
    public function show(string $id)
    {
        $usuario = Usuario::findOrfail($id);
        return view('Usuario.UShow' , compact('usuario'));
    }
   
    public function edit(string $id)
    {
        $usuario = Usuario::findOrfail($id);
        return view('Usuario.UEdit')->with('usuarios',$usuario);
    }

    public function update(Request $request, string $id)
    {
        $usuario = Usuario::findOrfail($id);
        
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'correo_electronico'=>['required','Email',Rule::unique('usuarios')->ignore($usuario->id)
        ],        ]);

        $usuario->nombre=$request->input('nombre');
        $usuario->correo_electronico=$request->input('correo_electronico');

        if ($usuario->save()){
            $mensaje = "El usuario se edito exitosamente"; 
           }
           
           else{
             $mensaje = "El Usuario no se edito exitosamente"; 
           }
   
           return redirect()->route('usuario.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Usuario::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "El usuario se elimino exitosamente"; 
           }
           
           else{
             $mensaje = "El usuario no se elimino exitosamente"; 
           }
   
           return redirect()->route('usuario.index')->with('mensaje',$mensaje);
    }
}
