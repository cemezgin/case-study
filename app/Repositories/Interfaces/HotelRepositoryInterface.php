<?php

namespace App\Repositories\Interfaces;

interface HotelRepositoryInterface
{
    public function all();
    public function getByHotel($id);
    public function delete($id);
    public function save($request);

}
