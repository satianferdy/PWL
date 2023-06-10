@extends('layouts.app')

@section('title', 'Mahasiswa')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>User List</h1>
        </div>

        <div class="section-body">
            <h2 class="section-title">Mahasiswa List</h2>
            <p class="section-lead">
                You can manage all users, such as editing, deleting and more.
            </p>

            <div class="row mt-4">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>All Mahasiswa</h4>
                        </div>
                        <div class="card-body">
                            {{-- add mahasiswa --}}
                            <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary float-left">Add
                                Mahasiswa</a>
                            {{-- search mahasiswa --}}
                            <div class="float-right">
                                <form method="GET">
                                    <div class="input-group">
                                        <input name="search" type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            </div>

                            <div class="clearfix mb-3"></div>

                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        {{-- <th>No</th> --}}
                                        <th>Nim</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Kelas</th>
                                        <th>Jurusan</th>
                                        <th>Phone</th>
                                        <th>Action</th>
                                    </tr>
                                    @forelse ($mahasiswas as $index => $mahasiswa)
                                        <tr>
                                            {{-- <td>
                                                {{ $index + $mahasiswas->firstItem() }}
                                            </td> --}}
                                            <td>{{ $mahasiswa->nim }}</td>
                                            <td>{{ $mahasiswa->nama }}</td>
                                            <td>{{ $mahasiswa->email }}</td>
                                            <td>{{ $mahasiswa->tanggal_lahir }}</td>
                                            <td>{{ $mahasiswa->kelas }}</td>
                                            <td>{{ $mahasiswa->jurusan }}</td>
                                            <td>{{ $mahasiswa->no_handphone }}</td>
                                            <td>
                                                <a href="{{ route('mahasiswa.show', $mahasiswa->id) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                                <a href="{{ route('mahasiswa.edit', $mahasiswa->id) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <form action="{{ route('mahasiswa.destroy', $mahasiswa->id) }}"
                                                    method="POST" style="display: inline-block">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger"
                                                        onclick="return confirm('Are you sure?')">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Found</td>
                                        </tr>
                                    @endforelse
                                </table>
                            </div>
                            <div class="float-right">
                                <nav>
                                    <ul class="pagination">
                                        {{ $mahasiswas->withQueryString()->links() }}
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
