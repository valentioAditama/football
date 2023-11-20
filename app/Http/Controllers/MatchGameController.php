<?php

namespace App\Http\Controllers;

use App\Models\classement;
use App\Models\club;
use App\Models\MatchGame;
use App\Http\Requests\StoreMatchGameRequest;
use App\Http\Requests\UpdateMatchGameRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

class MatchGameController extends Controller
{
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $data = MatchGame::select('match_games.id', 'match_games.score_1', 'match_games.score_2', 'club1.name as club_1', 'club2.name as club_2')
      ->join('clubs as club1', 'match_games.club_1', '=', 'club1.id')
      ->join('clubs as club2', 'match_games.club_2', '=', 'club2.id')
      ->paginate();

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

      $data = club::find($request->club_1);
      classement::create([
        'id_club' => $data->id
      ]);

      $data = club::find($request->club_2);
      classement::create([
        'id_club' => $data->id
      ]);

      if ($request->score_1 == $request->score_2) {
        DB::table('classements')->where('id_club', '=', $request->club_1)->update([
          'play' => 2,
          'draw' => 1,
          'goal_win' => $request->score_1,
          'goal_lose' => $request->score_2,
          'point' => 1,
        ]);

        DB::table('classements')->where('id_club', '=', $request->club_2)->update([
          'play' => 2,
          'draw' => 1,
          'goal_win' => $request->score_2,
          'goal_lose' => $request->score_1,
          'point' => 1,
        ]);

      } else if ($request->score_1 > $request->score_2) {
        classement::where('id_club', $request->club_1)->update([
          'play' => 2,
          'win' => 1,
          'goal_win' => $request->score_1,
          'goal_lose' => $request->score_2,
          'point' => 3
        ]);

        classement::where('id_club', $request->club_2)->update([
          'play' => 2,
          'lose' => 1,
          'goal_win' => $request->score_2,
          'goal_lose' => $request->score_1,
          'point' => 0,
        ]);

      } else {
        classement::where('id_club', $request->club_2)->update([
          'play' => 2,
          'win' => 1,
          'goal_win' => $request->score_2,
          'goal_lose' => $request->score_1,
          'point' => 3
        ]);

        classement::where('id_club', $request->club_1)->update([
          'play' => 2,
          'lose' => 1,
          'goal_win' => $request->score_1,
          'goal_lose' => $request->score_2,
          'point' => 0,
        ]);
      }

      MatchGame::create($request->all());
      return redirect()->back()->with(['success' => 'Successfully']);

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
