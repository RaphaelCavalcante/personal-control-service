<?php

namespace App\models;

use App\models\Department;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $fillable = ['name','dpt_id'];
    
    public function employees() {
        return $this->belongsToMany(Employee::class);
    }
    public function departments() {
        return $this->belongsTo(Department::class);
    }
}
