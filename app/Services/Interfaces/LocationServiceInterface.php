<?php

namespace App\Services\Interfaces;

interface LocationServiceInterface
{
    public function save($request);
    public function update($request, $location);
    public function map($location, $request);
}
