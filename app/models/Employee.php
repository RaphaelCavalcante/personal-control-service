<?php

namespace App\models;

use App\models\Position;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable=['name','phone_num', 'email'];
    
    public function position(){
        return $this->belongsTo(Position::class);
    }
}
