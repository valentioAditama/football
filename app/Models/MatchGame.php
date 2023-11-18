<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MatchGame extends Model
{
    use HasFactory;


    protected $table = 'match_games';
    protected $fillable = ['id', 'club_1', 'club_2', 'score_1', 'score_2'];
}
