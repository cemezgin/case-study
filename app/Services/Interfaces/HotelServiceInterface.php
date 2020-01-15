<?php

namespace App\Services\Interfaces;

interface HotelServiceInterface
{
    public function save($request);
    public function update($request, $hotel);
}
