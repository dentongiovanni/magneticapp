<?php

namespace Magnetic\Planner\Models;

use Illuminate\Database\Eloquent\Model;
use Magnetic\Planner\Models\Company;
class Employee extends Model
{
    protected $table = 'employees';

    protected $fillable = ['company_id','name'];

    public function company(){
    	return $this->hasOne(Company::class,'id','company_id');
    }

}
