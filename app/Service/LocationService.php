<?php

namespace App\Service;

use App\Location;
use App\Service\Interfaces\LocationServiceInterface;

class LocationService implements LocationServiceInterface
{
    public function save($request)
    {
        $location = new Location;
        $location = $this->map($location, $request);

        return $location;
    }

    /**
     * @param $request
     * @param $location Location
     * @return mixed
     */
    public function update($request, $location)
    {
        $location = $this->map($location, $request);
        return $location->save();
    }

    /**
     * @param $location
     * @param $request
     * @return Location
     */
    public function map($location, $request)
    {
        $location->city = $request['city'];
        $location->state = $request['state'];
        $location->country = $request['country'];
        $location->zip_code = $request['zip_code'];
        $location->address = $request['address'];

        return $location;
    }
}
