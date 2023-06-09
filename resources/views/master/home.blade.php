@extends('layouts.app')

@section('title', 'Homepage')

@section('content')
    <section class="section">
        <div class="section-header">
            <h1>Homepage</h1>
        </div>

        <div class="section-body">
            <div class="card">
                <div class="card-header">
                    <h4>Acount</h4>
                </div>
                <div class="card-body">
                    <ul class="list-group">
                        <li class="list-group-item">{{ Auth::user()->name }}</li>
                        <li class="list-group-item">{{ Auth::user()->username }}</li>
                        <li class="list-group-item">{{ Auth::user()->email }}</li>
                        <li class="list-group-item">{{ Auth::user()->created_at }}</li>
                        {{-- <li class="list-group-item">Vestibulum at eros</li> --}}
                    </ul>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('sidebar')
    @parent
    <li class="nav-item dropdown">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i>
            <span>Layout</span></a>
        <ul class="dropdown-menu">
            <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
            <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
            <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
        </ul>
    </li>
@endsection
