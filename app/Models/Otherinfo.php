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

    static function getInfo($checkinfo)
    {
        $getid = null;
        $pebandingKategory = Infocategory::all();
        if (!$pebandingKategory->isEmpty()) {
            foreach ($pebandingKategory as $kategori) {
                if ($kategori->slug === $checkinfo) {
                    $getid = $kategori;
                }
            }

            $data = Otherinfo::where('infocategory_id', $getid->id)->get();

            if (!$data->isEmpty()) {
                return $data;
            } else {
                $n = null;
                return $n;
            }
        } else {
            $n = null;
            return $n;
        }
    }
}
