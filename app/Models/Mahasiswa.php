<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Models\Mahasiswa_MataKuliah;

class Mahasiswa extends Model
{
    use HasFactory;

    // protected $table = 'mahasiswas'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswas
    // public $timestamps = false;
    // protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $guarded = 'id';

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function matakuliah()
    {
        // define the relationship
        return $this->belongsToMany(MataKuliah::class,'mahasiswa_matakuliah','mahasiswa_id','matakuliah_id')->withPivot('nilai');
    }

}
