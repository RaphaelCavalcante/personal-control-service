<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    protected $fillable=['name', 'comp_id'];

    public function positions() {
        return $this->hasMany(Position::class);
    }
    public function company() {
        return $this->belongsTo(Company::class);
    }
}
