<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable =['npm','nama','tempat_lahir','tanggal_lahir','alamat','prodi_id','url_foto'];
    
    public function prodi() {
        return $this->belongsTo(Prodi::class, 'prodi_id');
        // return $this->belongsTo(Nama Model:class, 'foreign_key');
        // 1 prodi 1 fakultas belongsTo()
        // 1 fakultas > 1 prodi hasMany()

        
    }
}
