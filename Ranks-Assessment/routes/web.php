<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RankController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
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
});