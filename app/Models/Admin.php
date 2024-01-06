<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    
    public function biodata()
    {
        return $this->hasOne(Biodata::class);
    }

    public function upload()
    {
        return $this->hasOne(Upload::class);
    }

}
