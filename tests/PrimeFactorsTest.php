<?php

use App\PrimeFactors;
use PHPUnit\Framework\TestCase;

class PrimeFactorsTest extends TestCase
{
    /** @test
     *
     * @dataProvider factors
     */

    function it_generates_prime_factors($number, $expected)
    {
        $factors = new PrimeFactors();
        $this->assertEquals($expected, $factors->generate($number));
    }

    public function factors(): array
    {
        return [
            [1, []], //
            [2, [2]],
            [3, [3]],
            [4, [2, 2]],
            [5, [5]],
            [100, [2, 2, 5, 5]],
            [333, [3, 3, 37]]
        ];
    }
}
