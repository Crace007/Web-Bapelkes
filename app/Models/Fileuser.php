<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Fileuser extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function category()
    {
        return $this->hasOne(Filecategory::class);
    }
}
