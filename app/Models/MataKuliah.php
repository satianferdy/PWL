<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa_MataKuliah;

class MataKuliah extends Model
{
    use HasFactory;

    protected $table = 'matakuliah';
    protected $guarded = 'id';

    public function mahasiswa()
    {
        // define the relationship
        return $this->belongsToMany(Mahasiswa::class,'mahasiswa_matakuliah','matakuliah_id','mahasiswa_id');
    }
}
