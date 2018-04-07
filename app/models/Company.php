<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $fillabel = ['name', 'phone_num', 'email'];

    public function departments() {
        return $this->hasMany(Department::class);
    }
}
