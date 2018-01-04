<?php

namespace App\Repositories;

use App\Agencia;
use Illuminate\Support\Facades\Cache;

class Agencias implements AgenciasInterface{

    public function getPaginate(){

            return Agencia::paginate(10);

    }

    public function store($request){

        $agencia = new Agencia;
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        
        if($agencia->save()){

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

            return Agencia::find($id);
        
    }

    public function update($request, $agencia){
        $agencia->nombre = $request->nombre;
        $agencia->direccion = $request->direccion;
        $agencia->rubro = $request->rubro;
        $agencia->telefono = $request->telefono;
        $agencia->save();

        return $agencia;
    }

    public function destroy($agencia){

        $agencia->delete();

        return $agencia;
    }

}
