<?php

use App\FizzBuzz;
use PHPUnit\Framework\TestCase;

class FizzBuzzTest extends TestCase
{
    // for multiples of three print Fizz instead of the number
    // for multiples of five print Buzz
    // for numbers that are multiples of both Three and Five print "FizzBuzz"

    /** @test */
    function it_generates_Fizz_for_the_first_multiple_of_three()
    {
        $fizz = new FizzBuzz();
        $this->assertEquals('Fizz', $fizz->generate(3));
    }

    /** @test */
    function it_generates_Buzz_for_the_first_multiple_of_five()
    {
        $fizz = new FizzBuzz();
        $this->assertEquals('Buzz', $fizz->generate(5));
    }

    /** @test */
    function it_generates_Buzz_for_the_first_multiple_of_three_and_five()
    {
        $fizz = new FizzBuzz();
        $this->assertEquals('FizzBuzz', $fizz->generate(15));
    }

    /** @test */
    function it_generates_FizzBuzz_for_thirty()
    {
        $fizz = new FizzBuzz();
        $this->assertEquals('FizzBuzz', $fizz->generate(30));
    }

    /** @test */
    function it_does_a_fizzbuzz()
    {
        $fizz = new FizzBuzz();
        $this->assertEquals(
            [
                1,
                2,
                'Fizz',
                4,
                'Buzz',
                'Fizz',
                7,
                8,
                'Fizz',
                'Buzz',
                11,
                'Fizz',
                13,
                14,
                'FizzBuzz'
            ],
            $fizz->fizzBuzz(15)
        );
    }
}
