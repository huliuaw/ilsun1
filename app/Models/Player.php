<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $table = 'players';

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }
    public $timestamps= false;

    protected $fillable = ['Pname', 'Photo','team_id' ];
}
