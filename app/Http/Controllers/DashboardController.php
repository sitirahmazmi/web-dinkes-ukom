<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Peserta;
use App\Models\Upload;
use App\Models\Biodata;
use App\Models\File;
use Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
        $data['peserta'] = Peserta::all();
        $data['biodata'] = Biodata::all();
    }

    public function peserta()
    {

    }
}
