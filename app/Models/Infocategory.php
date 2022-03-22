<?php

namespace App\Models;

use App\Models\Otherinfo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Infocategory extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function otherinfo()
    {
        return $this->HasMany(Otherinfo::class);
    }
}
