<?php

namespace App\Http\Controllers;

use App\Agencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class AgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
           // Cache::flush();
           $key = "messages.page".request('page',1);
           $agencia = Cache::tags('agencia')->rememberForever($key , function(){
               return Agencia::paginate(10);
           });
   
           return response()->json([
               'agencia' => $agencia
           ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agencia = new Agencia;
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        
        if($agencia->save()){

            Cache::tags('agencias')->flush();

            return response()->json([
                'mensaje' => 'creado con éxito',
                'agencia' => $agencia
            ]);

        }
        return response()->json([
            'mensaje' => 'error'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function show(Agencia $agencia)
    {
        $agencia = Cache::tags('agencias')->rememberForever("messages.{id}" , function() use ($id){
            return Agencia::find($id);
        });

        return response()->json([
            'agencia' => $agencia
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agencia $agencia)
    {
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        $agencia->save();

        Cache::tags('agencias')->flush();

        return response()->json([
            'mensaje' => 'actualizado con éxito',
            'agencia' => $agencia
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agencia $agencia)
    {
        $agencia->delete();
        
        Cache::tags('agencias')->flush();

        return response()->json([
            'mensaje' => 'eliminado con éxito'
        ]);
    }
}
