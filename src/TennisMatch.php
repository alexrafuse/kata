<?php

namespace App;

class TennisMatch
{
    protected TennisPlayer $playerOne;
    protected TennisPlayer $playerTwo;

    /**
     * @param $playerOne
     * @param $playerTwo
     */
    public function __construct($playerOne, $playerTwo)
    {
        $this->playerOne = $playerOne;
        $this->playerTwo = $playerTwo;
    }

    public function score(): string
    {
        if ($this->hasWinner()) {
            return 'Winner: ' . $this->leader()->name;
        }
        if ($this->hasAdvantage()) {
            return 'Advantage: ' . $this->leader()->name;
        }
        if ($this->hasDeuce()) {
            return 'deuce';
        }
        return sprintf(
            '%s-%s',
            $this->playerOne->toTerm(),
            $this->playerTwo->toTerm()
        );
    }

    public function addPointsToPlayer(TennisPlayer $player, int $points)
    {
        $player->addPoints($points);
    }

    protected function hasWinner(): bool
    {
        if (
            $this->playerOne->points > 3 &&
            $this->playerOne->points >= $this->playerTwo->points + 2
        ) {
            return true;
        }
        if (
            $this->playerTwo->points > 3 &&
            $this->playerTwo->points >= $this->playerOne->points + 2
        ) {
            return true;
        }
        return false;
    }

    protected function hasDeuce(): bool
    {
        return $this->playerOne->points > 2 &&
            $this->playerOne->points === $this->playerTwo->points;
    }

    protected function hasAdvantage(): bool
    {
        return $this->playerOne->points >= 3 &&
            $this->playerTwo->points >= 3 &&
            $this->playerOne->points != $this->playerTwo->points;
    }

    protected function leader(): TennisPlayer
    {
        return $this->playerOne->points > $this->playerTwo->points
            ? $this->playerOne
            : $this->playerTwo;
    }
}
