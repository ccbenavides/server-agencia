<?php


namespace App\Repositories;

use App\Repositories\Agencias;
use Illuminate\Support\Facades\Cache;

class CacheAgencias implements AgenciasInterface{

    protected $agencias;

    public function __construct(Agencias $agencias){

        $this->agencias = $agencias;

    }

    public function getPaginate(){

        $key = "messages.page".request('page',1);
        return Cache::tags('agencia')->rememberForever($key , function(){
            return $this->agencias->getPaginate();
        });

    }

    public function store($request){

        $agencia = $this->agencias->store($request);
        Cache::tags('agencias')->flush();
        return $agencia;

    }

    public function show($agencia){

        return Cache::tags('agencias')->rememberForever("messages.{id}" , function() use ($id){
            return $this->agencias->show($agencia);
        });

    }

    public function update($request, $agencia){

        $agencia = $this->agencias->update($request);
        Cache::tags('agencias')->flush();
        return $agencia;

    }

    public function destroy($agencia){

        $agencia = $this->agencias->destroy($request);
        Cache::tags('agencias')->flush();
        return $agencia;

    }


}