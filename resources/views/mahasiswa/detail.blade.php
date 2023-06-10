@extends('layouts.app')

@section('title', 'Detail Mahasiswa')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Detail Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    <form class="needs-validation" action="#">
                        <div class="card-header">
                            <h4>Detail Data {{ $mahasiswa->nama }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="nim">NIM</label>
                                <div class="col-sm-9">
                                    <div name="nim" type="text" class="form-control">
                                        {{ $mahasiswa->nim }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="nama">Name</label>
                                <div class="col-sm-9">
                                    <div name="nama" type="text" class="form-control">
                                        {{ $mahasiswa->nama }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <div class="form-control">
                                        {{ $mahasiswa->email }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Birthdate</label>
                                <div class="col-sm-9">
                                    <div class="form-control">
                                        {{ $mahasiswa->tanggal_lahir }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="kelas">Class</label>
                                <div class="col-sm-9">
                                    <div name="kelas" type="text" class="form-control">
                                        {{ $mahasiswa->kelas }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="jurusan">Faculity</label>
                                <div class="col-sm-9">
                                    <div name="jurusan" type="text" class="form-control">
                                        {{ $mahasiswa->jurusan }}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="no_handphone">Phone</label>
                                <div class="col-sm-9">
                                    <div name="no_handphone" type="text" class="form-control">
                                        {{ $mahasiswa->no_handphone }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <a href="{{ route('mahasiswa.index') }}" class="btn btn-primary">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
