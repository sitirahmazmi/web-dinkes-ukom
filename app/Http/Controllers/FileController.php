<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\File;

class FileController extends Controller
{
    public function store(Request $request)
    {

          $request->validate([
            'sk_pangkat_terakhir' => 'required',
            'sk_fungsional_terakhir' => 'required',
            'sk_pencantuman_gelar' => 'required',
            'ijazah_terakhir' => 'required',
            'str' => 'required',
            'sip' => 'required',
            'surat_rekomendasi' => 'required',
            'portofolio' => 'required',
            'skp' => 'required',
          ]);
        
          $user_id = auth()->user()->id;

          $files = File::create([
            'user_id' => $user_id,
            'sk_pangkat_terakhir'   => '',
            'sk_fungsional_terakhir' => '',
            'sk_pencantuman_gelar' => '',
            'ijazah_terakhir' => '',
            'str' => '',
            'sip' => '',
            'surat_rekomendasi' => '',
            'portofolio' => '',
            'skp' => '',
          ]);
      
      if ($request->hasFile('sk_pangkat_terakhir')) {
        $request->file('sk_pangkat_terakhir')->move('upload_file_peserta/',$request->file('sk_pangkat_terakhir')->getClientOriginalName());
        $files->sk_pangkat_terakhir = $request->file('sk_pangkat_terakhir')->getClientOriginalName();
      }
      if ($request->hasFile('sk_fungsional_terakhir')) {
        $request->file('sk_fungsional_terakhir')->move('upload_file_peserta/',$request->file('sk_fungsional_terakhir')->getClientOriginalName());
        $files->sk_fungsional_terakhir = $request->file('sk_fungsional_terakhir')->getClientOriginalName();
      }
      if ($request->hasFile('sk_pencantuman_gelar')) {
        $request->file('sk_pencantuman_gelar')->move('upload_file_peserta/',$request->file('sk_pencantuman_gelar')->getClientOriginalName());
        $files->sk_pencantuman_gelar = $request->file('sk_pencantuman_gelar')->getClientOriginalName();
      }
      if ($request->hasFile('ijazah_terakhir')) {
        $request->file('ijazah_terakhir')->move('upload_file_peserta/',$request->file('ijazah_terakhir')->getClientOriginalName());
        $files->ijazah_terakhir = $request->file('ijazah_terakhir')->getClientOriginalName();
      }
      if ($request->hasFile('str')) {
        $request->file('str')->move('upload_file_peserta/',$request->file('str')->getClientOriginalName());
        $files->str = $request->file('str')->getClientOriginalName();
      }
      if ($request->hasFile('sip')) {
        $request->file('sip')->move('upload_file_peserta/',$request->file('sip')->getClientOriginalName());
        $files->sip = $request->file('sip')->getClientOriginalName();
      }
      if ($request->hasFile('surat_rekomendasi')) {
        $request->file('surat_rekomendasi')->move('upload_file_peserta/',$request->file('surat_rekomendasi')->getClientOriginalName());
        $files->surat_rekomendasi = $request->file('surat_rekomendasi')->getClientOriginalName();
      }
      if ($request->hasFile('portofolio')) {
        $request->file('portofolio')->move('upload_file_peserta/',$request->file('portofolio')->getClientOriginalName());
        $files->portofolio = $request->file('portofolio')->getClientOriginalName();
      }
      if ($request->hasFile('skp')) {
        $request->file('skp')->move('upload_file_peserta/',$request->file('skp')->getClientOriginalName());
        $files->skp = $request->file('skp')->getClientOriginalName();
      }
      $files->save();
    }

    public function index() {
      return view('upload');
    }
    public function create() {
      return view('uploads.create');
    }
}
