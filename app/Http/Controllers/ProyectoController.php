<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proyecto;
use Illuminate\Support\Facades\DB; 

class ProyectoController extends Controller
{
   
    public function index(Request $request)
    {
        $ProyectoBuscar=$request->get('buscar');
        $proyectos=DB::table('proyectos')
                    ->select('id','nombre','descripcion', 'fecha_inicio', 'fecha_fin')
                    ->where('nombre', 'LIKE', '%'.$ProyectoBuscar.'%')
                    ->orwhere('descripcion', 'LIKE', '%'.$ProyectoBuscar.'%')
                    ->orwhere('fecha_inicio', 'LIKE', '%'.$ProyectoBuscar.'%')
                    ->orwhere('fecha_fin', 'LIKE', '%'.$ProyectoBuscar.'%')
                    ->paginate(10);
        return view ('Proyecto.PIndex', compact('proyectos','ProyectoBuscar'));
    
        $proyectos = Proyecto::paginate(20);
        return view('Proyecto.PIndex', compact('proyectos'));
 
    }

   
    public function create()
    {
        return view('Proyecto.PCreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|regex:/[0-9]+/',
            'fecha_fin'=>'required|regex:/[0-9]+/',
        ]);
        
        $proyecto = new Proyecto();
        $proyecto->nombre=$request->input('nombre');
        $proyecto->descripcion=$request->input('descripcion');
        $proyecto->fecha_inicio=$request->input('fecha_inicio');
        $proyecto->fecha_fin=$request->input('fecha_fin');

        if ($proyecto->save()){
         $mensaje = "El proyecto se creo exitosamente"; 
        }
        
        else{
          $mensaje = "El proyecto no se creo exitosamente"; 
        }

        return redirect()->route('proyecto.index')->with('mensaje',$mensaje);
    }
    
    public function show(string $id)
    {
        $proyecto = Proyecto::findOrfail($id);
        return view('Proyecto.PShow' , compact('proyecto'));
    }
   
    public function edit(string $id)
    {
        $proyecto = Proyecto::findOrfail($id);
        return view('Proyecto.PEdit')->with('proyectos',$proyecto);
    }

    public function update(Request $request, string $id)
    {
        $proyecto = Proyecto::findOrfail($id);
        
        $request->validate([
            'nombre'=>'required|regex:/[A-Z][a-z]+/i',
            'descripcion'=>'required|regex:/[A-Z][a-z]+/i',
            'fecha_inicio'=>'required|regex:/[0-9]+/',
            'fecha_fin'=>'required|regex:/[0-9]+/',
        ]);

        $proyecto->nombre=$request->input('nombre');
        $proyecto->descripcion=$request->input('descripcion');
        $proyecto->fecha_inicio=$request->input('fecha_inicio');
        $proyecto->fecha_fin=$request->input('fecha_fin');

        if ($proyecto->save()){
            $mensaje = "El proyecto se edito exitosamente"; 
           }
           
           else{
             $mensaje = "El proyecto no se edito exitosamente"; 
           }
   
           return redirect()->route('proyecto.index')->with('mensaje',$mensaje);

    }

    public function destroy(string $id)
    {
        $borrados = Proyecto::destroy($id);
    
        if ($borrados > 0){
            $mensaje = "El proyecto se elimino exitosamente"; 
           }
           
           else{
             $mensaje = "El proyecto no se elimino exitosamente"; 
           }
   
           return redirect()->route('proyecto.index')->with('mensaje',$mensaje);
    }
}
