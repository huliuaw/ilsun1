<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function players()
    {
        return $this->hasMany('App\Models\Player');
    }

    public $timestamps= false;

    protected $fillable = ['name','country','flag','logo','victories','loses','StrikeRatio','SpareRatio' ];
}
