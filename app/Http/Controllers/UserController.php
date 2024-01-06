<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\User;
use App\Models\Biodata;
use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function insert() {
        $result = User::create(
            [
                'nip' => '012345',
                'password' => '012345'
            ]
        );
        dump($result);
    }

    public function dashboard() {
        dd(auth()->user());
        return view('dashboard_user');
    }

    public function input() {
        return view('form_biodata');
    }

    public function store(Request $request, Biodata $biodatas) 
    {
        try {
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

            // Find or create the User based on NIP
            // $user = User::firstOrCreate(['nip' => $request->nip], [
            //     'nip' => $request->nip,
            //     'password' => bcrypt($request->password), // You should hash the password
            // ]);

            // Find or create the Admin based on NIP
            // $admin = Admin::firstOrCreate(['nip' => $request->nip], [
            //     'nip' => $request->nip,
            //     'name_admin' => $request->name_admin,
            // ]);

            // Find existing Biodata or create a new one
            $existingBiodata = Biodata::where('user_id', $user->id)
                ->where('admin_id', $admin->id)
                ->first();

            $dataToInsert = [
                'user_id' => $user->id,
                'admin_id' => $admin->id,
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
            ];

            if ($existingBiodata) {
                // If biodata already exists, update it
                $existingBiodata->update($dataToInsert);
            } else {
                // If biodata doesn't exist, create it
                Biodata::create($dataToInsert);
            }

            return response()->json($biodatas, 201);
        } catch (\Exception $e) {
            // Log error message or handle the exception
            Log::error($e->getMessage());
            return response()->json(['error' => 'Terjadi kesalahan dalam menyimpan data.'], 500);
        }
    }

    public function tampil() 
    {
        $result = User::all();
        return view('lihat_data')->with('data', $result);
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
        return redirect()->route('data_biodata');
    }

    public function editBiodata($biodatas) {
        $result = Biodata::where('id',$biodatas)->first();
        return view('edit_biodata')->with('biodata', $result);
    }

    public function editUpload($uploads) {
        $result = Upload::where('id',$uploads)->first();
        return view('edit_upload')->with('upload', $result);
    }
}
