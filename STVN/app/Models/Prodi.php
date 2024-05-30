<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'singkatan', 'fakultas_id'];

    public function Fakultas(){
        return $this ->belongsTo(Fakultas::class, 'fakultas_id');
        // 1 prodi 1 fakultas belongsTo()
        // 1 falkultas > 1 prodi hasMany()
    }
}
