<?php

namespace App\Http\Controllers;

use App\Models\classement;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
      $data = classement::join('clubs', 'clubs.id', '=', 'classements.id_club')
        ->select('name', 'play', 'win', 'draw', 'lose', 'goal_win', 'goal_lose', 'point')
        ->paginate(15);
      return view('welcome', compact('data'));
    }
}
