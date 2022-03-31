<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jobcategory extends Model
{
    use HasFactory;
    protected $guarded =  ['id'];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
