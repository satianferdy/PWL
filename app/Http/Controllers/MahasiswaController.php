<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Mahasiswa_MataKuliah;
use PDF;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->has('search')) {
            $mahasiswa = Mahasiswa::where('nama','Like','%'.$request->search.'%')
            ->orWhere('nim', 'Like', '%' . $request->search . '%')
            ->orWhere('jurusan', 'Like', '%' . $request->search . '%')
            ->orWhere('no_handphone', 'Like', '%' . $request->search . '%')
            ->paginate(5);
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $mahasiswa = Mahasiswa::orderBy('id', 'asc')->paginate(5);
        }

        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'image' => 'required',
            'email' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        //fungsi eloquent untuk menambah data
        // Mahasiswa::create($request->all());

        $mahasiswa = new Mahasiswa;
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->image = $request->get('image');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);

        //upload image
        if ($request->file('image')) {
            $image_name = $request->file('image')->store('images', 'public');
            $mahasiswa->image = $image_name;
        }
        $mahasiswa->save();

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($nim)
    {
        //
        $mahasiswa = Mahasiswa::find($nim);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    public function showNilai(string $nim)
    {
        // menampilkan detail mahasiswa berdasarkan nim
        $mahasiswa = Mahasiswa::with('matakuliah')
            ->where('nim', $nim)
            ->first();

        return view('mahasiswa.nilai', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */

    public function edit(string $nim)
    {
        //menampilkan detail data dengan menemukan berdasarkan nim Mahasiswa untuk diedit
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all(); //mendapatkan data dari tabel kelas
        return view('mahasiswa.edit', compact('mahasiswa', 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $nim)
    {
        //melakukan validasi data
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $mahasiswa->nim = $request->get('nim');
        $mahasiswa->nama = $request->get('nama');
        $mahasiswa->email = $request->get('email');
        $mahasiswa->jurusan = $request->get('jurusan');
        $mahasiswa->no_handphone = $request->get('no_handphone');
        // $mahasiswa->save();

        $kelas = new Kelas;
        $kelas->id = $request->get('kelas');

        //fungsi eloquent untuk menambah data dengan relasi belongsTo
        $mahasiswa->kelas()->associate($kelas);

        // edit image
        if ($mahasiswa->image && file_exists(storage_path('app/public/' . $mahasiswa->image))) {
            \Storage::delete('public/' . $mahasiswa->image);
        }
        $image_name = $request->file('image')->store('images', 'public');
        $mahasiswa->image = $image_name;

        $mahasiswa->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nim)
    {
        //
        $mahasiswa = Mahasiswa::find($nim)->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa deleted successfully');
    }

    public function cetak_pdf(string $nim)
    {

        $mahasiswa = Mahasiswa::with('matakuliah')->where('nim', $nim)->first();
        $pdf = PDF::loadview('mahasiswa.pdf', ['mahasiswa' => $mahasiswa]);
        return $pdf->stream();
    }
}
