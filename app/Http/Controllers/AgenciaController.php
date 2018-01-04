<?php

namespace App\Http\Controllers;

use App\Agencia;
use Illuminate\Http\Request;



use App\Repositories\Agencias;
use App\Repositories\CacheAgencias;

class AgenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     protected $agencias;

    public function __construct(CacheAgencias $agencias){
        //dd("asd");
        $this->agencias = $agencias;

    }

    public function index()
    {
           // Cache::flush();

           $agencias = $this->agencias->getPaginate();
           
   
           return response()->json([
               'agencias' => $agencias
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
        $agencia = $this->agencias->store($request);
        return response()->json($agencia);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function show(Agencia $agencia)
    {
        $agencia = $this->agencias->show($agencia);
        return response()->json($agencia);
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
        
        $agencia = $this->agencias->update($request, $agencia);
        return response()->json($agencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Agencia  $agencia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agencia $agencia)
    {
        
        $agencia = $this->agencia->destroy($agencia);
        return response()->json($agencia);
    }
}
