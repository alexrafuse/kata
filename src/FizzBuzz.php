<?php

namespace App;

class FizzBuzz
{
    public function generate(int $number)
    {
        if ($number % 5 == 0 && $number % 3 == 0) {
            return 'FizzBuzz';
        } elseif ($number % 5 == 0) {
            return 'Buzz';
        } elseif ($number % 3 == 0) {
            return 'Fizz';
        } else {
            return $number;
        }
    }

    public function fizzBuzz(int $maximum): array
    {
        $result = [];
        for ($i = 1; $i <= $maximum; $i++) {
            $result[] = $this->generate($i);
        }

        return $result;
    }
}
