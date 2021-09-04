<?php

use App\StringCalculator;
use PHPUnit\Framework\TestCase;

class StringCalculatorTest extends TestCase
{
    /** @test */
    function it_evaluates_an_empty_string_as_zero()
    {
        $calculator = new StringCalculator();
        $this->assertSame(0, $calculator->add(''));
    }

    /** @test
     * @dataProvider  cases
     */
    function it_can_add_add_numbers_seperated_by_commas(
        string $numbers,
        int $expected
    ) {
        $calculator = new StringCalculator();
        $this->assertSame($expected, $calculator->add($numbers));
    }

    /** @test */
    function it_accepts_a_newline_character_as_a_seperator()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("5\n5"));
    }

    /** @test */
    function negative_numbers_are_disallowed()
    {
        $calculator = new StringCalculator();
        $this->expectException(\Exception::class);
        $calculator->add('5,-4');
    }

    /** @test */
    function numbers_greater_than_1000_are_ignored()
    {
        $calculator = new StringCalculator();
        $this->assertSame(5, $calculator->add('5,1001'));
    }

    /** @test */
    function it_supports_custom_delimiters()
    {
        $calculator = new StringCalculator();
        $this->assertSame(10, $calculator->add("//:\n5:5"));
    }

    function cases(): array
    {
        return [
            ['1,1', 2], //
            ['1,1', 2], //
            ['1,2,3', 6]
        ];
    }
}
