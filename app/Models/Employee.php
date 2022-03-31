<?php

namespace App\Models;

use App\Models\User;
use App\Models\Rankcategory;
use App\Models\Jobcategory;
use App\Models\Trainingschedule;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    public $timestamps = true;
    protected $guarded = ['id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function rankcategory()
    {
        return $this->belongsTo(Rankcategory::class, 'pangkat_id');
    }

    public function jobcategory()
    {
        return $this->belongsTo(Jobcategory::class, 'jabatan_id');
    }
}
