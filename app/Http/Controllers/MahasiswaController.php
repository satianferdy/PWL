<?php

namespace App\Http\Controllers;

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
        $mahasiswas = DB::table('mahasiswas')
        ->when($request->input('search'), function ($query, $search) {
            $query->where('nama', 'like', '%' . $search . '%')
            ->orWhere('email', 'like', '%' . $search . '%')
            ->orWhere('nim', 'like', '%' . $search . '%')
            ->orWhere('kelas', 'like', '%' . $search . '%')
            ->orWhere('jurusan', 'like', '%' . $search . '%');
        })
        ->paginate(5);
        return view('mahasiswa.index', compact('mahasiswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('mahasiswa.create');
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
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        Mahasiswa::create($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.detail', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'nim' => 'required',
            'nama' => 'required',
            'email' => 'required',
            'tanggal_lahir' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'no_handphone' => 'required',
        ]);

        Mahasiswa::find($id)->update($request->all());

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $mahasiswa = Mahasiswa::find($id)->delete();

        return redirect()->route('mahasiswa.index')
            ->with('success', 'Mahasiswa deleted successfully');
    }
}
