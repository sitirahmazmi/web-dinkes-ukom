<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Upload;
use App\Models\File;
use App\Models\FileType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Auth;

class UserController extends Controller
{

    public function input() {
        return view('form_biodata');
    }
    public function dashboardUser() {
        return view('dashboard_peserta');
    }

    public function store(Request $request, Biodata $biodatas) 
    {
        if (auth()->check()) {
            $request->validate([
                'nama' => 'required',
                'unit_kerja' => 'required',
                'kab_kota' => 'required',
                'jenis_jabatan_fungsional' => 'required',
                'kategori' => 'required',
                'jenjang_saat_ini' => 'required',
                'jenjang_akan_diduduki' => 'required',
                'nomor_wa' => 'required',
                'email' => 'required',
                'no_sk_pangkat_terakhir' => 'required',
                'tgl_sk_pangkat_terakhir' => 'required',
                'no_sk_fungsional_terakhir' => 'required',
                'tgl_sk_fungsional_terakhir' => 'required',
                'no_sk_pencatuman_gelar' => 'required',
                'tgl_sk_pencatuman_gelar' => 'required',
                'no_ijazah_terakhir' => 'required',
                'tgl_ijazah_terakhir' => 'required'
            ]);

            $user_id = auth()->user()->id;
            $user_nip = auth()->user()->nip;

                $dataBio = Biodata::create([
                    'user_id' => $user_id,
                    'nip'   => $user_nip,
                    'nama' => $request->nama,
                    'unit_kerja' => $request->unit_kerja,
                    'kab_kota' => $request->kab_kota,
                    'jenis_jabatan_fungsional' => $request->jenis_jabatan_fungsional,
                    'kategori' => $request->kategori,
                    'jenjang_saat_ini' => $request->jenjang_saat_ini,
                    'jenjang_akan_diduduki' => $request->jenjang_akan_diduduki,
                    'nomor_wa' => $request->nomor_wa,
                    'email' => $request->email,
                    'no_sk_pangkat_terakhir' => $request->no_sk_pangkat_terakhir,
                    'tgl_sk_pangkat_terakhir' => $request->tgl_sk_pangkat_terakhir,
                    'no_sk_fungsional_terakhir' => $request->no_sk_fungsional_terakhir,
                    'tgl_sk_fungsional_terakhir' => $request->tgl_sk_fungsional_terakhir,
                    'no_sk_pencatuman_gelar' => $request->no_sk_pencatuman_gelar,
                    'tgl_sk_pencatuman_gelar' => $request->tgl_sk_pencatuman_gelar,
                    'no_ijazah_terakhir' => $request->no_ijazah_terakhir,
                    'tgl_ijazah_terakhir' => $request->tgl_ijazah_terakhir
                ]);

                return view('dashboard_peserta');
               
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You need to log in to create biodata.');
        }
    }

    public function lihatData() 
    {
        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Retrieve the biodata for the authenticated user only
        $result = Biodata::where('user_id', $user->id)->get();

        $files = File::where('user_id', $user->id)->get();

        return view('lihat_data')->with(['data' => $result, 'files' => $files]);
    }

    public function updateBiodata(Request $form, Biodata $biodatas) 
    {
        $result = $form->validate([
            'nama' => 'required',
            'unit_kerja' => 'required',
            'kab_kota' => 'required',
            'jenis_jabatan_fungsional' => 'required',
            'kategori' => 'required',
            'jenjang_saat_ini' => 'required',
            'jenjang_akan_diduduki' => 'required',
            'nomor_wa' => 'required',
            'email' => 'required',
            'no_sk_pangkat_terakhir' => 'required',
            'tgl_sk_pangkat_terakhir' => 'required',
            'no_sk_fungsional_terakhir' => 'required',
            'tgl_sk_fungsional_terakhir' => 'required',
            'no_sk_pencatuman_gelar' => 'required',
            'tgl_sk_pencatuman_gelar' => 'required',
            'no_ijazah_terakhir' => 'required',
            'tgl_ijazah_terakhir' => 'required'
        ]);
        $biodatas->update($result);
        return redirect()->route('data_diri');
    }

    public function editBiodata($biodatas) {
        //$result = Biodata::where('id',$biodatas)->first();
        $result = Biodata::all();
        return view('edit_biodata')->with('biodata', $result);
    }
   
}
