<?php

namespace Test;

use App\RankingNbaTeams;
use PHPUnit\Framework\TestCase;

class RankingNbaTeamsTest extends TestCase
{
    /**
     *
     */
    public function testNameOfTeamInFirstPartOfAnswerMatches()
    {
        //given
        $rankingNbaTeams = new RankingNbaTeams();

        //when
        $clubResult = $rankingNbaTeams->nbaCup('Los Angeles Clippers 104 Dallas Mavericks 88', 'Los Angeles Clippers');

        //then
        $firstPartOfResult = explode(':', $clubResult)[0];
        $this->assertEquals('Los Angeles Clippers', $firstPartOfResult);
    }
}
