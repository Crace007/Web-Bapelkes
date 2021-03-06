<?php

namespace App\Models;

use App\Models\Agenda;
use App\Models\Post;
use App\Models\Employee;
use App\Models\Trainingschedule;
use App\Models\Role;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Carbon;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function age()
    {
        return Carbon::parse($this->attributes['birthdate'])->age;
    }
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function employee()
    {
        return $this->hasOne(Employee::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function Fileuser()
    {
        return $this->belongsTo(Fileuser::class);
    }

    public function trainingschedule()
    {
        return $this->hasMany(Trainingschedule::class);
    }

    public function agenda()
    {
        return $this->hasMany(Agenda::class);
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['tanggal_lahir'])
            ->translatedFormat('l, d F Y');
    }
}
