@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if(Auth::user()->role == 'Project Owner')
                        @include('roles.po')
                    @elseif(Auth::user()->role == 'Dosen')
                        @include('roles.dosen')
                    @elseif(Auth::user()->role == 'Asisten Dosen')
                        @include('roles.asdos')
                    @elseif(Auth::user()->role == 'Mahasiswa')
                        @include('roles.mahasiswa')
                    @else
                        @include('roles.admin')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
