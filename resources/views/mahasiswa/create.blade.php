@extends('layouts.app')

@section('title', 'Create Mahasiswa')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Add Data Mahasiswa</h1>
        </div>

        <div class="section-body">
            <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your i
                            nput.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form class="needs-validation" action="{{ route('mahasiswa.store') }}" method="POST">
                        @csrf
                        <div class="card-header">
                            <h4>Add Data Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="nim">NIM</label>
                                <div class="col-sm-9">
                                    <input name="nim" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        What's your nim?
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="nama">Name</label>
                                <div class="col-sm-9">
                                    <input name="nama" type="text" class="form-control" required="">
                                    <div class="invalid-feedback">
                                        What's your name?
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="kelas">Class</label>
                                <div class="col-sm-9">
                                    <input name="kelas" type="text" class="form-control">
                                    <div class="valid-feedback">
                                        What's your class?
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="jurusan">Faculity</label>
                                <div class="col-sm-9">
                                    <input name="jurusan" type="text" class="form-control">
                                    <div class="valid-feedback">
                                        What's your faculity?
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label" for="no_handphone">Phone</label>
                                <div class="col-sm-9">
                                    <input name="no_handphone" type="text" class="form-control">
                                    <div class="valid-feedback">
                                        What's your Phone?
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
