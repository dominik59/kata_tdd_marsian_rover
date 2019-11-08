<?php


namespace App;


class RankingNbaTeams
{
    function nbaCup($resultSheet, $toFind)
    {
        $results = $this->prepareScoreTable($resultSheet);
        $isTeamInResult = in_array($toFind, array_keys($results));

//        $numberOfResults = count($results);
//        for ($i = 0; $i < $numberOfResults; $i++) {
//
//        }
        if ($isTeamInResult) {
            $result = $toFind;
        } else {
            $result = $toFind . ':This team didn\'t play!';
        }

        return $result;
    }

    /**
     * @param $resultSheet
     *
     * @return array
     */
    private function prepareScoreTable($resultSheet): array
    {
        $strLen = mb_strlen($resultSheet);
        $results = [];
        $name = '';
        $number = '';
        $endOfTeamName = false;
        for ($i = 0; $i < $strLen; $i++) {
            if (is_numeric($resultSheet[$i])) {
                $endOfTeamName = true;
                $number .= $resultSheet[$i];
            } else {
                if ($endOfTeamName) {
                    $results[trim($name)] = (int) $number;
                    $name = '';
                    $number = '';
                    $endOfTeamName = false;
                }
                $name .= $resultSheet[$i];
            }
            if ($i === $strLen - 1) {
                $results[trim($name)] = (int) $number;
            }
        }

        return $results;
    }
}
