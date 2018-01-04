<?php

namespace App\Http\Controllers;

use App\Marca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use App\Repositories\Marcas;
use App\Repositories\CacheMarcas;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $marcas;

    public function __construct(CacheMarcas $marcas){

        $this->marcas = $marcas;

    }

    public function index()
    {
           // Cache::flush();

        $marcas = $this->marcas->getPaginate();

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
        $marca = $this->marcas->store($request);
        return response()->json($marca);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {

        $marca = $this->marcas->show($marca);
        return response()->json($marca);
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
        
        $marca = $this->marcas->update($request, $marca);

        return response()->json($marca);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        
        $marca = $this->marcas->destroy($marca);
        return response()->json($marca);
    }
}
