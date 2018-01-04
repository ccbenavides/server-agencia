<?php

namespace App\Repositories;

interface MarcasInterface{

    public function getPaginate();

    public function store($request);

    public function show($marca);

    public function update($request, $marca);

    public function destroy($marca);


}