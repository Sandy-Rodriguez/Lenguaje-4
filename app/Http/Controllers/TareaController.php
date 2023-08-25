<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tarea;
use Illuminate\Support\Facades\DB; 

class TareaController extends Controller
{
    
    public function index(Request $request)
    {
        $TareaBuscar=$request->get('buscar');
        $tareas=DB::table('tareas')
                    ->select('id','nombre','descripcion', 'fecha_inicio', 'fecha_fin', 'proyecto_id', 'usuario_id', 'estado')
                    ->where('nombre', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('descripcion', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('estado', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('fecha_inicio', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('fecha_fin', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('proyecto_id', 'LIKE', '%'.$TareaBuscar.'%')
                    ->orwhere('usuario_id', 'LIKE', '%'.$TareaBuscar.'%')

                    ->paginate(10);
        return view ('Tarea.TIndex', compact('tareas','TareaBuscar'));
    
        $tareas = Tarea::paginate(20);
        return view('Tareas.TIndex', compact('tareas'));
 
    }

   
    public function create()
    {
        return view('Tarea.TCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'estado'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|regex:/[0-9]+/',
            'fecha_fin'=>'required|regex:/[0-9]+/',
            'proyecto_id'=>'required|regex:/[0-9]+/',
            'usuario_id'=>'required|regex:/[0-9]+/',

        ]);
        
        $tarea = new Tarea();
        $tarea->nombre=$request->input('nombre');
        $tarea->descripcion=$request->input('descripcion');
        $tarea->descripcion=$request->input('estado');
        $tarea->fecha_inicio=$request->input('fecha_inicio');
        $tarea->fecha_fin=$request->input('fecha_fin');
        $tarea->proyecto_id=$request->input('proyecto_id');
        $tarea->usuario_id=$request->input('usuario_id');


        if ($tarea->save()){
         $mensaje = "La tarea se creo exitosamente"; 
        }
        
        else{
          $mensaje = "La tarea no se creo exitosamente"; 
        }

        return redirect()->route('tarea.index')->with('mensaje',$mensaje);
    }
    
    public function show(string $id)
    {
        $tarea = Tarea::findOrfail($id);
        return view('Tarea.TShow' , compact('tarea'));
    }
   
    public function edit(string $id)
    {
        $tarea = Tarea::findOrfail($id);
        return view('Tarea.TEdit')->with('tareas',$tarea);
    }

    public function update(Request $request, string $id)
    {
        $tarea = Tarea::findOrfail($id);
        
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'estado'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|regex:/[0-9]+/',
            'fecha_fin'=>'required|regex:/[0-9]+/',
            'proyecto_id'=>'required|regex:/[0-9]+/',
            'usuario_id'=>'required|regex:/[0-9]+/',
        ]);

        $tarea->nombre=$request->input('nombre');
        $tarea->descripcion=$request->input('descripcion');
        $tarea->descripcion=$request->input('estado');
        $tarea->fecha_inicio=$request->input('fecha_inicio');
        $tarea->fecha_fin=$request->input('fecha_fin');
        $tarea->proyecto_id=$request->input('proyecto_id');
        $tarea->usuario_id=$request->input('usuario_id');

        if ($tarea->save()){
            $mensaje = "La tarea se edito exitosamente"; 
           }
           
           else{
             $mensaje = "La tarea no se edito exitosamente"; 
           }
   
           return redirect()->route('tarea.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Tarea::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "La tarea se elimino exitosamente"; 
           }
           
           else{
             $mensaje = "La tarea no se elimino exitosamente"; 
           }
   
           return redirect()->route('tarea.index')->with('mensaje',$mensaje);
    }
}
