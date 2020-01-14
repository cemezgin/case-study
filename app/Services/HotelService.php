<?php

namespace App\Services;

use App\Hotel;

class HotelService
{
    const REPUTATION_BADGE_RED = 'red',
        REPUTATION_BADGE_YELLOW = 'yellow',
        REPUTATION_BADGE_GREEN = 'green';

    /**
     * @param $request
     * @return bool
     */
    public function save($request)
    {
        $hotel = new Hotel;
        $hotel = $this->map($hotel, $request);

        return $hotel->save();
    }

    /**
     * @param $request
     * @param $hotel Hotel
     * @return bool
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
