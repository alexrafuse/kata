<?php

use App\TennisMatch;
use App\TennisPlayer;
use PHPUnit\Framework\TestCase;

class TennisMatchTest extends TestCase
{
    // a game is won by the first player to have won at least four points in total and at least two more points than their opponent.
    // the running score of each game is described in a manner for tennis:
    // 0 love, 1 fifteen, 2 thirty, 3 forty
    // if at least three points have been scored by each player, and the scores are equal, the score is "deuce"
    // if at least three points have been scored by each player and a player has 1 more point, the score of the game is advantage for the player in the lead

    /** @test
     *@dataProvider scores
     */
    function it_scores_the_correct_amounts(
        $playerOnePoints,
        $playerTwoPoints,
        $expectedScore
    ) {
        $match = new TennisMatch(
            ($alex = new TennisPlayer('Alex')),
            ($bridget = new TennisPlayer('Bridget'))
        );
        $match->addPointsToPlayer($alex, $playerOnePoints);
        $match->addPointsToPlayer($bridget, $playerTwoPoints);

        $this->assertSame($expectedScore, $match->score());
    }

    public function scores(): array
    {
        return [
            [0, 0, 'love-love'], //
            [1, 0, 'fifteen-love'],
            [1, 1, 'fifteen-fifteen'],
            [2, 0, 'thirty-love'],
            [2, 2, 'thirty-thirty'],
            [2, 1, 'thirty-fifteen'],
            [3, 0, 'forty-love'],
            [3, 3, 'deuce'],
            [6, 6, 'deuce'],
            [4, 3, 'Advantage: Alex'],
            [3, 4, 'Advantage: Bridget'],
            [5, 3, 'Winner: Alex'],
            [0, 4, 'Winner: Bridget']
        ];
    }
}
