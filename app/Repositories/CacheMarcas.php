<?php


namespace App\Repositories;

use App\Repositories\Marcas;
use Illuminate\Support\Facades\Cache;

class CacheMarcas implements MarcasInterface{

    protected $marcas;

    public function __construct(Marcas $marcas){

        $this->marcas = $marcas;

    }

    public function getPaginate(){

        $key = "messages.page".request('page',1);
        return Cache::tags('marcas')->rememberForever($key , function(){
            return $this->marcas->getPaginate();
        });

    }

    public function store($request){

        $marca = $this->marcas->store($request);
        Cache::tags('marcas')->flush();
        return $marca;

    }

    public function show($marca){

        return Cache::tags('marcas')->rememberForever("messages.{id}" , function() use ($id){
            return $this->marcas->show($marca);
        });

    }

    public function update($request, $marca){

        $marca = $this->marcas->update($request);
        Cache::tags('marcas')->flush();
        return $marca;

    }

    public function destroy($marca){

        $marca = $this->marcas->destroy($request);
        Cache::tags('marcas')->flush();
        return $marca;

    }
}