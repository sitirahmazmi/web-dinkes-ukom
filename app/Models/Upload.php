<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Upload extends Model
{
    use HasFactory;
    protected $fillable = [
        'sk_pangkat_terakhir',
        'sk_fungsional_terakhir',
        'sk_pencantuman_gelar',
        'ijazah_terakhir',
        'str',
        'sip',
        'surat_rekomendasi',
        'portofolio'
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