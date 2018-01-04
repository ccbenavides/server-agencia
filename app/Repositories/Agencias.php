<?php

namespace App\Repositories;

use App\Agencia;
use Illuminate\Support\Facades\Cache;

class Agencias{

    public function getPaginate(){

        $key = "messages.page".request('page',1);
        return Cache::tags('agencia')->rememberForever($key , function(){
            return Agencia::paginate(10);
        });

    }

    public function store($request){

        $agencia = new Agencia;
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        
        if($agencia->save()){

            Cache::tags('agencias')->flush();

            return [
                'mensaje' => 'creado con éxito',
                'agencia' => $agencia
            ];

        }
        return [
            'mensaje' => 'error'
        ];

    }

    public function show($agencia){
        return Cache::tags('agencias')->rememberForever("messages.{id}" , function() use ($id){
            return Agencia::find($id);
        });
    }

    public function update($request, $agencia){
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        $agencia->save();
        
        Cache::tags('agencias')->flush();

        return $agencia;
    }

    public function destroy($agencia){
        $agencia->delete();
        
        Cache::tags('agencias')->flush();

        return $agencia;
    }

}
