@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Formulir Pendaftaran Operator SIAP - {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('store-operator')}}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nama </label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email </label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>NIP </label>
                        <input type="text" name="nip" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan </label>
                        <input type="text" name="jabatan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Hp </label>
                        <input type="text" name="nohp" class="form-control" required>
                    </div>
                    <div class="text-right">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
