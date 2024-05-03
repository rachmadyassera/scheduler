@extends('layouts.main')
@section('content')
<div class="container">
        <div class="card shadow">
            <div class="card-header">
                <h4 class="card-title">Data Agenda {{ Auth::user()->profil->organization->name }}</h4>
                <div class="card-header-action">
                    <div class="buttons">
                        <a href="{{route ('activity.create')}}"  class="btn btn-icon btn-success"><i class="fas fa-plus-circle"></i> Kegiatan</a>
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
                                <td>Status</td>
                                <td>Created</td>
                                <td>Updated</td>
                                <td style="width: 100px">Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($activity as $act )
                            <tr>
                                <td style="vertical-align: middle; ">{{$act->date_activity}}</td>
                                <td style="vertical-align: middle; ">{{$act->name_activity}}</td>
                                <td style="vertical-align: middle; ">{{$act->location}}</td>
                                <td style="vertical-align: middle; ">{{$act->description}}</td>
                                <td style="vertical-align: middle; ">{{$act->accompanying_officer}}</td>
                                <td style="vertical-align: middle; ">
                                    @if ($act->status_activity =='complete')
                                    <div class="badge badge-success">Complete</div>
                                    @elseif ($act->status_activity =='cancel')
                                    <div class="badge badge-danger">Cancel</div>
                                    @else
                                    <div class="badge badge-warning">Pending</div>
                                    @endif
                                </td>
                                <td style="vertical-align: middle; ">{{$act->created_at}}</td>
                                <td style="vertical-align: middle; ">{{$act->updated_at}}</td>
                                <td style="vertical-align: middle; ">
                                    <ul class="nav">
                                        <a href="{{route ('activity.edit', $act->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="/cancel-activity/{{$act->id}}" class="btn-sm btn-danger" onclick="confirmation(event)"><i class="fa fa-window-close"></i></a>
                                    </ul>
                                </td>
                            </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</div>

@endsection
