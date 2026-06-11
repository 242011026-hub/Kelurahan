<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use App\Models\Surat;

class Penduduk extends Model
{

    protected $fillable = ['nik', 'jk', 'nama', 'alamat'];

    public function surats(): HasMany
    {
        return $this->hasMany(Surat::class);
    }   
}
