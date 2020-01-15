<?php

namespace App\Http\Controllers;

use App\Hotel;
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
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json($this->hotelRepository->all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
            return response()->json($this->hotelRepository->save($request));
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
    public function update(Request $request, Hotel $hotel)
    {
        return response()->json($this->hotelRepository->update($request, $hotel));
    }

    /**
     * Remove the specified resource from storage.
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        return response()->json($this->hotelRepository->delete($id));
    }
}
