<?php

namespace App\Models;

use App\Models\Infocategory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Otherinfo extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function infocategory()
    {
        return $this->belongsTo(Infocategory::class);
    }
}
