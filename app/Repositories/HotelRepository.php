<?php

namespace App\Repositories;

use App\Hotel;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use App\Service\Interfaces\HotelServiceInterface;

class HotelRepository implements HotelRepositoryInterface
{
    private $hotelService;

    public function __construct(HotelServiceInterface $hotelService)
    {
        $this->hotelService = $hotelService;
    }

    public function all()
    {
        return Hotel::with('location')->get();
    }

    public function getByHotel($id)
    {
        return Hotel::with('location')->find($id);
    }

    public function delete($id)
    {
        return Hotel::destroy($id);
    }

    public function save($request)
    {
        $hotel = $this->hotelService->save($request);

        return $this->getByHotel($hotel->id);
    }

    public function update($request, Hotel $hotel)
    {
        return $this->hotelService->update($request, $this->getByHotel($hotel->id));
    }

    public function checkBookingAvailability($id)
    {
        $check =  Hotel::where('availability', '>', 0)
            ->where('id', $id)
            ->first();

        if($check){
            return true;
        }

        return false;
    }

}

