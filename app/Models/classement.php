<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class classement extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'classements';
  protected $fillable = ['id', 'id_club', 'play', 'win', 'draw', 'lose', 'goal_win', 'goal_lose'];
  protected $dates = ['deleted_at'];
}
