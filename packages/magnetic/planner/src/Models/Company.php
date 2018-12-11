<?php

namespace Magnetic\Planner\Models;

use Illuminate\Database\Eloquent\Model;
use Magnetic\Planner\Models\Employee;
class Company extends Model
{
    protected $table = 'companies';

    protected $fillable = ['name'];

    public function employees(){
    	return $this->hasMany(Employee::class,'company_id','id');
    }
}
