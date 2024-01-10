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

                return redirect()->route('home')->with('success', 'Biodata created successfully!');
               
        } else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'You need to log in to create biodata.');
        }
    }

    public function tampil() 
    {
        $result = User::all();
        return view('data_peserta')->with('data', $result);
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
        $result = Biodata::where('id',$biodatas)->first();
        return view('edit_biodata')->with('biodata', $result);
    }

    public function createUpload(){
        return view('form_upload');
    }

    public function indexFile()
    {
        // Retrieve all uploads for display
        $uploads = Upload::all();

        return view('uploads.index', compact('uploads'));
    }

    public function createFile()
    {
        return view('uploads.create');
    }

    public function storeFile(Request $request)
    {
        $user_id = auth()->user()->id;

        $request->validate([
            'files.*' => 'required|mimes:pdf,doc,docx|max:10240', // Contoh: Hanya izinkan file PDF, DOC, atau DOCX dengan ukuran maksimal 10MB
        ]);

        foreach ($request->file('files') as $file) {
            $upload = Upload::create([
                'user_id' => $user_id,
                'file_name' => $file->getClientOriginalName(),
                'file_path' => $file->store('uploads'),
                'file_version' => Upload::where('user_id', $user_id)
                    ->where('file_name', $file->getClientOriginalName())
                    ->max('file_version') + 1,
            ]);
        }

        return redirect()->route('uploads.index')->with('success', 'Files uploaded successfully.');
    }
    // public function fileUpload(Request $request){
    //     if (auth()->check()) {
    //         // Validasi request
    //         $request->validate([
    //             'sk_pangkat_terakhir' => 'required',
    //             //'file_path_sk_pangkat_terakhir' => 'required',
    //             'sk_fungsional_terakhir' => 'required',
    //             //'file_path_sk_fungsional_terakhir' => 'required',
    //             'sk_pencantuman_gelar' => 'required',
    //             //'file_path_sk_pencantuman_gelar' => 'required',
    //             'ijazah_terakhir' => 'required',
    //             //'file_path_ijazah_terakhir' => 'required',
    //             'str' => 'required',
    //             //'file_path_str' => 'required',
    //             'sip' => 'required',
    //             //'file_path_sip' => 'required',
    //             'surat_rekomendasi' => 'required',
    //             //'file_path_surat_rekomendasi' => 'required',
    //             'portofolio' => 'required',
    //             //'file_path_portofolio' => 'required',
    //             'skp' => 'required',
    //             //'file_path_skp' => 'required',

    //         ]);

    //         $user_id = auth()->user()->id;

    //         // Simpan file ke storage
    //         $filePath = $request->file('sk_pangkat_terakhir')->store('uploads');
    //         $filePath = $request->file('sk_fungsional_terakhir')->store('uploads');
    //         $filePath = $request->file('sk_pencantuman_gelar')->store('uploads');
    //         $filePath = $request->file('ijazah_terakhir')->store('uploads');
    //         $filePath = $request->file('str')->store('uploads');
    //         $filePath = $request->file('sip')->store('uploads');
    //         $filePath = $request->file('surat_rekomendasi')->store('uploads');
    //         $filePath = $request->file('portofolio')->store('uploads');
    //         $filePath = $request->file('skp')->store('uploads');
            

    //         // Simpan data ke database
    //         $upload = new Upload([
    //             'user_id' => $user_id,
    //             'sk_pangkat_terakhir' => $request->input('sk_pangkat_terakhir'),
    //             'file_path_sk_pangkat_terakhir' => $filePath,
    //             'sk_fungsional_terakhir' => $request->input('sk_fungsional_terakhir'),
    //             'file_path_sk_fungsional_terakhir' => $filePath,
    //             'sk_pencantuman_gelar' => $request->input('sk_pencantuman_gelar'),
    //             'file_path_sk_pencantuman_gelar' => $filePath,
    //             'ijazah_terakhir' => $request->input('ijazah_terakhir'),
    //             'file_path_ijazah_terakhir' => $filePath,
    //             'str' => $request->input('str'),
    //             'file_path_str' => $filePath,
    //             'sip' => $request->input('sip'),
    //             'file_path_sip' => $filePath,
    //             'surat_rekomendasi' => $request->input('surat_rekomendasi'),
    //             'file_path_surat_rekomendasi' => $filePath,
    //             'portofolio' => $request->input('portofolio'),
    //             'file_path_portofolio' => $filePath,
    //             'skp' => $request->input('skp'),
    //             'file_path_skp' => $filePath,
                
    //         ]);

    //         $upload->save();

    //                 return back()
    //                 ->with('success','File has been uploaded.')
    //                 ->with('file', $fileName);
                
    //     }
    // }
    // public function fileUpload(Request $req){
    //     if (auth()->check()) {
    //         $req->validate([
    //             'file' => 'required|mimes:csv,txt,doc,docx
    //             ,xlx,xls,pdf|max:3072'
    //         ]);
    //         $fileModel = new Upload;
    //         if($req->file()) {
    //             $user_id = auth()->user()->id;
    //             $fileName = time().'_'.$req->file->getClientOriginalName();
    //             $filePath = $req->file('file')->storeAs('uploads', $fileName, 'public');
    //             $fileModel->sk_pangkat_terakhir = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_sk_pangkat_terakhir = '/storage/' . $filePath;
    //             $fileModel->sk_fungsional_terakhir = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_sk_fungsional_terakhir = '/storage/' . $filePath;
    //             $fileModel->sk_pencantuman_gelar = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_sk_pencantuman_gelar = '/storage/' . $filePath;
    //             $fileModel->ijazah_terakhir = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_ijazah_terakhir = '/storage/' . $filePath;
    //             $fileModel->str = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_str = '/storage/' . $filePath;
    //             $fileModel->sip = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_sip = '/storage/' . $filePath;
    //             $fileModel->surat_rekomendasi = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_surat_rekomendasi = '/storage/' . $filePath;
    //             $fileModel->portofolio = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_portofolio = '/storage/' . $filePath;
    //             $fileModel->skp = time().'_'.$req->file->getClientOriginalName();
    //             $fileModel->file_path_skp = '/storage/' . $filePath;
    //             $fileModel->save();
    //             return back()
    //             ->with('success','File has been uploaded.')
    //             ->with('file', $fileName);
    //         }
    //     }
    // }
    
    public function editUpload($uploads) {
        $result = Upload::where('id',$uploads)->first();
        return view('edit_upload')->with('upload', $result);
    }
}
