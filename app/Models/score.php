<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class score extends Model
{
  use HasFactory;

  protected $table = 'scores';
  protected $fillable = ['id', 'id_club', 'play', 'win', 'draw', 'lose', 'goal_win', 'goal_lose', 'point'];
}
