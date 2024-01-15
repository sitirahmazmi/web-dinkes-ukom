<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function store(Request $request)
    {
       $request->validate([
        'sk_pangkat_terakhir' => 'required:max:255',
        'overview_sk_pangkat_terakhir' => 'required',
        'sk_fungsional_terakhir' => 'required:max:255',
        'overview_sk_fungsional_terakhir' => 'required',
        'sk_pencantuman_gelar' => 'required:max:255',
        'overview_sk_pencantuman_gelar' => 'required',
        'ijazah_terakhir' => 'required:max:255',
        'overview_ijazah_terakhir' => 'required',
        'str' => 'required:max:255',
        'overview_str' => 'required',
        'sip' => 'required:max:255',
        'overview_sip' => 'required',
        'surat_rekomendasi' => 'required:max:255',
        'overview_surat_rekomendasi' => 'required',
        'portofolio' => 'required:max:255',
        'overview_portofolio' => 'required',
        'skp' => 'required:max:255',
        'overview_skp' => 'required',
      ]);

      auth()->user()->files()->create([
        'sk_pangkat_terakhir' => $request->get('sk_pangkat_terakhir'),
        'overview_sk_pangkat_terakhir' => $request->get('overview_sk_pangkat_terakhir'),
        'sk_fungsional_terakhir' => $request->get('sk_fungsional_terakhir'),
        'overview_sk_fungsional_terakhir' => $request->get('overview_sk_fungsional_terakhir'),
        'sk_pencantuman_gelar' => $request->get('sk_pencantuman_gelar'),
        'overview_sk_pencantuman_gelar' => $request->get('overview_sk_pencantuman_gelar'),
        'ijazah_terakhir' => $request->get('ijazah_terakhir'),
        'overview_ijazah_terakhir' => $request->get('overview_ijazah_terakhir'),
        'str' => $request->get('str'),
        'overview_str' => $request->get('overview_str'),
        'sip' => $request->get('sip'),
        'overview_sip' => $request->get('overview_sip'),
        'surat_rekomendasi' => $request->get('surat_rekomendasi'),
        'overview_surat_rekomendasi' => $request->get('overview_surat_rekomendasi'),
        'portofolio' => $request->get('portofolio'),
        'overview_portofolio' => $request->get('overview_portofolio'),
        'skp' => $request->get('skp'),
        'overview_skp' => $request->get('overview_skp'),
      ]);

      return back()->with('message', 'Your file is submitted Successfully');
    }

    public function upload()
    {
      $uploadedFile = $request->file('file');
      $filename = time().$uploadedFile->getClientOriginalName();

      Storage::disk('local')->putFileAs(
        'files/'.$filename,
        $uploadedFile,
        $filename
      );

      $upload = new Upload;
      $upload->filename = $filename;

      $upload->user()->associate(auth()->user());

      $upload->save();

      return response()->json([
        'id' => $upload->id
      ]);
    }

    public function index() {
      return view('upload');
  }
}
