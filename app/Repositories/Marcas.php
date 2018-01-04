<?php

namespace App\Repositories;

use App\Marca;
use Illuminate\Support\Facades\Cache;

class Marcas implements MarcasInterface{

    public function getPaginate(){

            return Marca::paginate(10);

    }

    public function store($request){

        $marca = new Marca;
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        
        if($marca->save()){

            return [
                'mensaje' => 'creado con éxito',
                'marca' => $marca
            ];

        }
        return [
            'mensaje' => 'error'
        ];

    }

    public function show($marca){

            return Marca::find($id);

    }

    public function update($request, $marca){
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        $marca->save();

        return $marca;
    }

    public function destroy($marca){

        $marca->delete();
        
        return $marca;

    }

}