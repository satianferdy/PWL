@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Nilai List</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Mahasiswa Nilai List</h2>
            <p class="section-lead">
                You can manage all users, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Nilai</h4>
                        </div>
                        <div class="card-body">
                            <table class="mb-3">
                                <tr>
                                    <td>
                                        <h5><b>Nama</b></h5>
                                    </td>
                                    <td>
                                        <h5>: {{ $mahasiswa->nama }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5><b>NIM</b></h5>
                                    </td>
                                    <td>
                                        <h5>: {{ $mahasiswa->nim }}</h5>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h5><b>Kelas</b></h5>
                                    </td>
                                    <td>
                                        <h5>: {{ $mahasiswa->kelas->nama_kelas }}</h5>
                                    </td>
                                </tr>
                            </table>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <th>
                                            <p><b>Mata Kuliah</b></p>
                                        </th>
                                        <th>
                                            <p><b>SKS</b></p>
                                        </th>
                                        <th>
                                            <p><b>Semester</b></p>
                                        </th>
                                        <th>
                                            <p><b>Nilai</b></p>
                                        </th>
                                    </tr>
                                    @foreach ($mahasiswa->matakuliah as $item)
                                        <tr>
                                            <td>{{ $item->nama_matkul }}</td>
                                            <td>{{ $item->sks }}</td>
                                            <td>{{ $item->semester }}</td>
                                            <td>{{ $item->pivot->nilai }}</td>
                                        </tr>
                                    @endforeach
                                </table>
                                <a href="{{ route('mahasiswa.cetak_pdf', $mahasiswa->nim) }}"
                                    class="btn btn-danger float-right">Cetak
                                    PDF</a>
                                <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
