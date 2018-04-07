<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillabel=['name'];

    public function positions() {
        return $this->hasMany(Position::class);
    }
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
