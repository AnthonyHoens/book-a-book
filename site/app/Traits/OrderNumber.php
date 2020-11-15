<?php

namespace App\Traits;

trait OrderNumber {
    function randomNumber($count) :string {
        $number = 0;

        for($i = 0; $i < $count - 1; $i++) {
            $rand = rand(0,9);
            $number = $number . strval($rand);
        }

        return $number;
    }
}
