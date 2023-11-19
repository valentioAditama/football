<?php

namespace App\Http\Controllers;

use App\Models\classement;
use App\Models\club;
use App\Models\MatchGame;
use App\Http\Requests\StoreMatchGameRequest;
use App\Http\Requests\UpdateMatchGameRequest;
use Illuminate\Support\Facades\Request;

class MatchGameController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = MatchGame::select('id', 'club_1', 'club_2', 'score_1', 'score_2')->paginate(15);
    $dataClub = club::select('id', 'name', 'city')->paginate(15);

    return view('score', compact('data', 'dataClub'));
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    //
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(StoreMatchGameRequest $request)
  {
    try {
      if ($request->club_1 == $request->club_2) {
        return redirect()->back()->with(['error' => 'Tidak boleh ada pertandingan yang sama']);
      }

      // Logika jika skor sama
      if ($request->score_1 == $request->score_2){
        $pointsTeam1 = 1;
        $pointsTeam2 = 1;
      } else if ($request->score_1 > $request->score_2){
        $pointsTeam1 = 3;
        $pointsTeam2 = 0;
      } else {
        $pointsTeam1 = 0;
        $pointsTeam2 = 3;
      }

      // Mendapatkan entri klasemen untuk Club A
      $klasemenClubA = Classement::where('id_club', $request->club_1)->first();

      // Memperbarui nilai-nilai klasemen Club A sesuai hasil pertandingan
      $klasemenClubA->play += 1;
      $klasemenClubA->win += $pointsTeam1;
      $klasemenClubA->draw += ($request->score_1 == $request->score_2) ? 1 : 0;
      $klasemenClubA->lose += $pointsTeam2;
      $klasemenClubA->goal_win += $request->score_1;
      $klasemenClubA->goal_lose += $request->score_2;
      $klasemenClubA->save();

      // Mendapatkan entri klasemen untuk Club B
      $klasemenClubB = Classement::where('id_club', $request->club_2)->first();

      // Memperbarui nilai-nilai klasemen Club B sesuai hasil pertandingan
      $klasemenClubB->play += 1;
      $klasemenClubB->win += $pointsTeam2;
      $klasemenClubB->draw += ($request->score_1 == $request->score_2) ? 1 : 0;
      $klasemenClubB->lose += $pointsTeam1;
      $klasemenClubB->goal_win += $request->score_2;
      $klasemenClubB->goal_lose += $request->score_1;
      $klasemenClubB->save();

    } catch (\Error $error) {
      return redirect()->back()->with(['error' => $error->getMessage()]);
    }
  }

  /**
   * Display the specified resource.
   */
  public function show(MatchGame $matchGame)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function edit(MatchGame $matchGame)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(UpdateMatchGameRequest $request, MatchGame $matchGame)
  {
    try {
      $data = MatchGame::find($matchGame);
      $data->update($request->all());

      return redirect()->back()->with(['success' => 'Successfully']);
    } catch (\Error $error) {
      return redirect()->back()->with(['error' => $error->getMessage()]);
    }
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(MatchGame $matchGame)
  {
    try {
      $data = MatchGame::find($matchGame);
      $data->delete();
      return redirect()->back()->with(['success' => 'Successfully']);

    } catch (\Error $error) {
      return redirect()->back()->with(['error' => $error->getMessage()]);
    }
  }
}
