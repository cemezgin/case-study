<?php

namespace App\Service\Interfaces;

interface HotelServiceInterface
{
    public function save($request);

    public function update($request, $hotel);
}

