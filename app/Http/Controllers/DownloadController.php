<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fileuser;

class DownloadController extends Controller
{
    public function getdownload($id)
    {
        $item = Fileuser::where('id', $id)->first();
        $pathToFile = storage_path('app/public/' . $item->nama_file);
        return response()->download($pathToFile);
    }
}
