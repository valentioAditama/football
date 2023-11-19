<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class club extends Model
{
  use HasFactory, SoftDeletes;

  protected $table = 'clubs';
  protected $fillable = ['id', 'name', 'city'];
  protected $dates = ['deleted_at'];
}
