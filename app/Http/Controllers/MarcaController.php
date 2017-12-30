<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::paginate(10);
        return response()->json([
            'marcas' => $marcas
        ]);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $marca = new Marca;
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        
        if($marca->save()){
            return response()->json([
                'mensaje' => 'creado con éxito',
                'marca' => $marca
            ]);

        }
        return response()->json([
            'mensaje' => 'error'
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        return response()->json([
            'marca' => $marca
        ]);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Marca $marca)
    {
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        $marca->save();

        return response()->json([
            'mensaje' => 'actualizado con éxito',
            'marca' => $marca
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return response()->json([
            'mensaje' => 'eliminado con éxito'
        ]);
    }
}
