<?php


/*
 * Using collection pipeline programming, calculate ranks for the given teams based on their respective scores. Same scores should be ranked equally
 * If multiple teams get the same rank, the next ranks should be skipped based on the team count.
 * e.g. If Team B & C gets second rank, 3rd rank should skipped & the team eligible for the 3rd rank should be given 4th rank.
 *
 * Do not use any loops, if statements, or ternary operators.
 */

$scores = collect([
    ['score' => 76, 'team' => 'A'],
    ['score' => 62, 'team' => 'B'],
    ['score' => 82, 'team' => 'C'],
    ['score' => 86, 'team' => 'D'],
    ['score' => 91, 'team' => 'E'],
    ['score' => 67, 'team' => 'F'],
    ['score' => 67, 'team' => 'G'],
    ['score' => 82, 'team' => 'H'],
]);

$ranks = $scores->unique('score')
    ->sortDesc() 
    ->mapWithKeys(function ($score, $rank) use ($scores) {
        $rank++; 
        $teams = $scores->where('score', $score['score'])->pluck('team'); 
        $skippedRanks = max(0, $teams->count() - 1); 
        return $teams->mapWithKeys(function ($team) use ($rank, &$skippedRanks) {
            $finalRank = $rank + $skippedRanks; 
            $skippedRanks--; 
            return [$team => $finalRank];
        });
    })
    ->all();

print_r($ranks);





