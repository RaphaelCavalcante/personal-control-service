<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillable = ['name', 'address'];

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
