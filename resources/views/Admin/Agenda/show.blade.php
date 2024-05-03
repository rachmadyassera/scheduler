@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data kegiatan 1 jam sebelum dan sesudah pada waktu kegiatan yang akan didaftarkan </h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- Table clientside --}}
                    <table id="datatables" class="table table-hover table-bordered table-striped">
                        <thead>
                            <tr>
                                <td>Tanggal</td>
                                <td>Nama Kegiatan</td>
                                <td>Lokasi</td>
                                <td>Keterangan</td>
                                <td>Petugas Pendamping</td>
                                <td>Created</td>
                                <td>Updated</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($arround_act as $ar_act )
                            <tr>
                                <td style="vertical-align: middle; ">{{$ar_act->date_activity}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->name_activity}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->location}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->description}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->accompanying_officer}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->created_at}}</td>
                                <td style="vertical-align: middle; ">{{$ar_act->updated_at}}</td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Konfirmasi Penjadwalan Kegiatan {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('activity.approve-activity')}}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" class="form-control" value="{{$act->id}}" readonly>

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
