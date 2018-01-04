<?php

namespace App\Repositories;

interface AgenciasInterface{

    public function getPaginate();

    public function store($request);

    public function show($agencia);

    public function update($request, $agencia);

    public function destroy($agencia);


}