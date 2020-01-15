<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreHotelRequest;
use App\Location;
use App\Repositories\Interfaces\LocationRepositoryInterface;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    private $locationRepository;

    public function __construct(LocationRepositoryInterface $locationRepository)
    {
        $this->locationRepository = $locationRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->locationRepository->all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreHotelRequest $request
     */
    public function store(StoreHotelRequest $request)
    {
        return $this->locationRepository->save($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $this->locationRepository->getByLocation($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Location $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        return $this->locationRepository->update($request, $location);
    }

    /**
     * Remove  the specified resource from storage.
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return $this->locationRepository->delete($id);
    }
}
