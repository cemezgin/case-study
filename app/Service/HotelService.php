<?php

namespace App\Service;

use App\Hotel;
use App\Location;
use App\Service\Interfaces\HotelServiceInterface;
use App\Service\Interfaces\LocationServiceInterface;

class HotelService implements HotelServiceInterface
{
    const REPUTATION_BADGE_RED = 'red',
        REPUTATION_BADGE_YELLOW = 'yellow',
        REPUTATION_BADGE_GREEN = 'green';

    private $locationService;

    public function __construct(LocationServiceInterface $locationService)
    {
        $this->locationService = $locationService;
    }

    public function save($request)
    {
        $hotel = new Hotel;
        $hotel = $this->map($hotel, $request);

        $location = $this->locationService->save($request->location);
        $hotel->save();

        return $hotel->location()->save($location);
    }

    /**
     * @param $request
     * @param $hotel Hotel
     * @return mixed
     */
    public function update($request, $hotel)
    {
        $hotel = $this->map($hotel, $request);

        return $hotel->save();
    }

    /**
     * @param $hotel
     * @param $request
     * @return Hotel
     */
    private function map($hotel, $request)
    {
        $hotel->name = $request->name;
        $hotel->rating = $request->rating;
        $hotel->category = $request->category;
        $hotel->image = $request->image;
        $hotel->reputation = $request->reputation;
        $hotel->reputation_badge = $this->calculateReputationBadge($request->reputation);
        $hotel->price = $request->price;
        $hotel->availability = $request->availability;

        return $hotel;
    }

    private function calculateReputationBadge($reputation)
    {
        if ($reputation <= 500) {
            return self::REPUTATION_BADGE_RED;
        } elseif ($reputation <= 799) {
            return self::REPUTATION_BADGE_YELLOW;
        } else {
            return self::REPUTATION_BADGE_GREEN;
        }
    }
}
