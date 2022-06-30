<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filecategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function Fileuser()
    {
        return $this->hasMany(Fileuser::class);
    }
}
