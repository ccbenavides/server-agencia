<?php

namespace App\Repositories;

use App\Marca;
use Illuminate\Support\Facades\Cache;

class Marcas{

    public function getPaginate(){

        $key = "messages.page".request('page',1);
        return Cache::tags('marcas')->rememberForever($key , function(){
            return Marca::paginate(10);
        });

    }

    public function store($request){

        $marca = new Marca;
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        
        if($marca->save()){

            Cache::tags('marcas')->flush();

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

        return Cache::tags('marcas')->rememberForever("messages.{id}" , function() use ($id){
            return Marca::find($id);
        });

    }

    public function update($request, $marca){
        $marca->nombre = $request->nombre;
        $marca->central = $request->central;
        $marca->telefono = $request->telefono;
        $marca->email = $request->email;
        $marca->save();

        Cache::tags('marcas')->flush();

        return $marca;
    }

    public function destroy($marca){

        $marca->delete();
        
        Cache::tags('marcas')->flush();

        return $marca;

    }

}