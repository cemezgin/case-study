<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ApiTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testGetAllHotels()
    {
        $response = $this->get('/api/v1/hotels');

        $response->assertStatus(200);
    }

    public function testPostHotel()
    {
        $response = $this->post('/api/v1/hotels', [
            "name" => "Testhotel123123",
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
            "availability" => 100
        ]);

        $response->assertStatus(201);
    }

    public function testPostHotelContainsFree()
    {
        $response = $this->post('/api/v1/hotels', [
            "name" => "Free Testhotel123123",
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
            "availability" => 100
        ]);

        $response->assertStatus(405);
    }

    public function testPostHotelContainsOffer()
    {
        $response = $this->post('/api/v1/hotels', [
            "name" => "Testhotel Offer 123123",
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
            "availability" => 100
        ]);

        $response->assertStatus(405);
    }

    public function testPostHotelInvalidCategory()
    {
        $response = $this->post('/api/v1/hotels', [
            "name" => "Testhotel Offer 123123",
            "rating" => 5,
            "category" => "hotels",
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
            "availability" => 100
        ]);

        $response->assertStatus(500);
    }


}
