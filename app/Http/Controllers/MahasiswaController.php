<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
            ->paginate(10);
        } else {
            $mahasiswa = Mahasiswa::with('kelas')->get();
            $mahasiswa = Mahasiswa::orderBy('id', 'desc')->paginate(10);
        }

        return view('mahasiswa.index', ['mahasiswa' => $mahasiswa]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $kelas = Kelas::all();
        return view('mahasiswa.create', ['kelas' => $kelas]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        // $mahasiswa = new Mahasiswa;
        // $mahasiswa->nim = $request->get('nim');
        // $mahasiswa->nama = $request->get('nama');
        // $mahasiswa->jurusan = $request->get('jurusan');
        // $mahasiswa->no_handphone = $request->get('no_handphone');
        // $mahasiswa->save();

        // $kelas = new Kelas;
        // $kelas->id = $request->get('kelas');

        // $mahasiswa->kelas()->associate($kelas);
        // $mahasiswa->save();

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa created successfully.');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nim)
    {
        //
        $mahasiswa = Mahasiswa::with('kelas')->where('nim', $nim)->first();
        $kelas = Kelas::all();

        return view('mahasiswa.edit', compact('mahasiswa' , 'kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nim)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'kelas_id' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        Mahasiswa::find($nim)->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully');
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
}
