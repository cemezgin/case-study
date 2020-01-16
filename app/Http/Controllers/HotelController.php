<?php

namespace App\Http\Controllers;

use App\Helpers\HotelHelper;
use App\Hotel;
use App\Http\Requests\StoreHotelRequest;
use App\Repositories\Interfaces\HotelRepositoryInterface;
use Illuminate\Http\Request;

class HotelController extends Controller
{

    private $hotelRepository;

    public function __construct(HotelRepositoryInterface $hotelRepository)
    {
        $this->hotelRepository = $hotelRepository;
    }

    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        return response()->json($this->hotelRepository->all());
    }

    /**
     *
     * Store a given resource.
     *
     * @param StoreHotelRequest $request
     * @return \Exception|\Illuminate\Http\JsonResponse|null
     * @throws \Exception
     */
    public function store(StoreHotelRequest $request)
    {
        if ($request->validated()) {
            HotelHelper::checkSpecialWords($request->name);
            return response()
                ->json($this->hotelRepository->save($request), 201);
        } else {
            return response()->exception;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response()->json($this->hotelRepository->getByHotel($id));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Hotel $hotel
     * @return \Illuminate\Http\Response
     */
    public function update(StoreHotelRequest $request, Hotel $hotel)
    {
        if ($request->validated()) {
            HotelHelper::checkSpecialWords($request->name);
            return response()->json($this->hotelRepository->update($request, $hotel));

        } else {
            return response()->exception;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return response()->json($this->hotelRepository->delete($id));
    }

    /**
     * Check is booking available for hotel
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function check($id)
    {
        return response()->json($this->hotelRepository->checkBookingAvailability($id));
    }
}
