<?php

use App\RomanNumerals;
use PHPUnit\Framework\TestCase;

class RomanNumeralsTest extends TestCase
{
    /** @test
     *@dataProvider numerals
     */
    function it_generates_a_roman_numeral($number, $expected)
    {
        $roman = new RomanNumerals();
        $this->assertEquals($expected, $roman->generate($number));
    }

    /** @test */
    function it_cannot_generate_a_roman_numeral_for_less_than_1()
    {
        $this->assertFalse(RomanNumerals::generate(0));
    }

    /** @test */
    function it_cannot_generate_a_numeral_over_3999()
    {
        $this->assertFalse(RomanNumerals::generate(4000));
    }

    public function numerals(): array
    {
        return [
            [1, 'I'], //
            [2, 'II'],
            [3, 'III'],
            [4, 'IV'],
            [5, 'V'],
            [7, 'VII'],
            [8, 'VIII'],
            [9, 'IX'],
            [40, 'XL'],
            [50, 'L'],
            [51, 'LI'],
            [90, 'XC'],
            [100, 'C'],
            [400, 'CD'],
            [500, 'D'],
            [900, 'CM'],
            [1000, 'M'],
            [3999, 'MMMCMXCIX']
        ];
    }
}
