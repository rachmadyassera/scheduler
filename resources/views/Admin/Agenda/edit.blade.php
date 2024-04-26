@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Pembaharuan Data Kegiatan {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('activity.update', $act->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label>Tanggal </label>
                        <input type="datetime-local" name="date_activity" class="form-control" required  value="{{$act->date_activity}}" autofocus>
                    </div>
                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="name_activity" class="form-control" required value="{{$act->name_activity}}">
                    </div>
                    <div class="form-group">
                        <label>Lokasi </label>
                        <textarea name="location"  class="form-control" style="height: 100px;" >{{$act->location}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi </label>
                        <textarea name="description"  class="form-control" style="height: 100px;" >{{$act->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Pejabat Pendamping </label>
                        <textarea name="accompanying_officer"  class="form-control" style="height: 100px;" >{{$act->accompanying_officer}}</textarea>
                    </div>
                    <div class="text-right">
                        <input type="submit" value="Simpan Data" class="btn btn-success">
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
