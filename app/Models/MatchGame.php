<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MatchGame extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'match_games';
  protected $fillable = ['id', 'club_1', 'club_2', 'score_1', 'score_2'];
  protected $dates = ['deleted_at'];
}
