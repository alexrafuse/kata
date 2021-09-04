<?php

namespace App;

class StringCalculator
{
    const MAXIMUM_NUMBER_ALLOWED = 1000;
    protected string $delimiter = ",|\n";

    public function add(string $numbers): int
    {
        $numbers = $this->parseString($numbers);
        $this->disallowNegatives($numbers);
        $numbers = $this->ignoreNumbersOverMaximum($numbers);
        return array_sum($numbers);
    }

    protected function parseString(string $numbers): array
    {
        $customDelimiterRegex = "\/\/(.)\n";
        if (preg_match("/{$customDelimiterRegex}/", $numbers, $matches)) {
            $this->delimiter = $matches[1];
            $numbers = str_replace($matches[0], '', $numbers);
        }
        return preg_split("/{$this->delimiter}/", $numbers);
    }

    /**
     * @param $numbers
     * @throws \Exception
     */
    protected function disallowNegatives($numbers): void
    {
        foreach ($numbers as $number) {
            if ($number < 0) {
                throw new \Exception('Negative numbers are not allowed');
            }
        }
    }
    /**
     * @param $numbers
     * @return array
     */
    protected function ignoreNumbersOverMaximum($numbers): array
    {
        return array_filter($numbers, function ($number) {
            return $number <= self::MAXIMUM_NUMBER_ALLOWED;
        });
    }
}
