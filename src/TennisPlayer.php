<?php

namespace App;

class TennisPlayer
{
    public string $name;
    public int $points = 0;

    /**
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function addPoints(int $points)
    {
        $this->points += $points;
    }

    public function toTerm(): string
    {
        switch ($this->points) {
            case 0:
                return 'love';
            case 1:
                return 'fifteen';
            case 2:
                return 'thirty';
            case 3:
                return 'forty';
            default:
                return '';
        }
    }
}
