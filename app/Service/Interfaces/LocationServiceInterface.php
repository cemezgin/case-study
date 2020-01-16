<?php

namespace App\Service\Interfaces;

interface LocationServiceInterface
{
    public function save($request);

    public function update($request, $location);

    public function map($location, $request);
}

