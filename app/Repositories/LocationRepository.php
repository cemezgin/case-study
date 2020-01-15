<?php

namespace App\Repositories;

use App\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use App\Service\Interfaces\LocationServiceInterface;

class LocationRepository implements LocationRepositoryInterface
{
    private $locationService;

    public function __construct(LocationServiceInterface $locationService)
    {
        $this->locationService = $locationService;
    }

    public function all()
    {
        return Location::all();
    }

    public function getByLocation($id)
    {
        return Location::find($id);
    }

    public function delete($id)
    {
        return Location::destroy($id);
    }

    public function save($request)
    {
        return $this->locationService->save($request);
    }

    public function update($request, Location $location)
    {
        return $this->locationService->update($request, $this->getByLocation($location->id));
    }

}
