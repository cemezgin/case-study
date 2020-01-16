<?php

namespace App\Helpers;

use Symfony\Component\HttpKernel\Exception\HttpException;

class HotelHelper
{
    public static function checkSpecialWords($name)
    {
        if (preg_match('[Free|Offer|Book|Website]', $name)) {
            throw new HttpException(400, 'Name can not contain Free, Offer, Book, Website words.');
        }
    }
}
