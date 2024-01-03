<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Biodata extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'user_id',
        'admin_id',
        'unit_kerja',
        'kab_kota',
        'jenis_jabatan_fungsional',
        'kategori',
        'jenjang_saat_ini',
        'jenjang_akan_diduduki',
        'nomor_wa',
        'email',
        'no_sk_pangkat_terakhir',
        'tgl_sk_pangkat_terakhir',
        'no_sk_fungsional_terakhir',
        'tgl_sk_fungsional_terakhir',
        'no_sk_pencatuman_gelar',
        'tgl_sk_pencatuman_gelar',
        'no_ijazah_terakhir',
        'tgl_ijazah_terakhir'
    ];
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
