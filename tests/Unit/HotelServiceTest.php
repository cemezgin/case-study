<?php

namespace Tests\Unit;

use App\Service\HotelService;
use Tests\TestCase;

class HotelServiceTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function testSaveReturnIsValidObject()
    {
        $request = [ "name" => "Free Testhotel123123",
            "rating" => 5,
            "category" => "hotel",
            "location" => [
                "city" => "Culiacan",
                "state" => "Morelos",
                "country" => "Mexico",
                "zip_code" => 12334,
                "address" => "Boulevard Díaz Ordaz No. 9 Cantarranas"
            ],
            "image" => "https://127.0.0.1:8000/",
            "reputation" => 101,
            "price" => 1000,
            "availability" => 100];

        $hotelService = \Mockery::mock(HotelService::class, 'LocationServiceInterface');
        $hotelService->shouldReceive('save')->once()->andReturnSelf();

        $result = $hotelService->save($request);
        $this->assertIsObject($result);
    }
}
