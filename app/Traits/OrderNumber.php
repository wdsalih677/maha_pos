<?php

namespace App\Traits;

trait OrderNumber{
    public function generateRandomNumber()
    {
        $number = random_int(1,5000);
        return $number;
    }
}