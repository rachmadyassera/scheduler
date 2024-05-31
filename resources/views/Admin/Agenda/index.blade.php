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
                    <table id="datatables-disordering" class="table table-hover table-bordered table-striped">
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
                                <td>Aksi</td>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($activity as $act )
                            <tr>
                                <td style="width:100px">{{$act->date_activity}}</td>
                                <td>{{$act->name_activity}}</td>
                                <td >{{$act->location}}</td>
                                <td >{{$act->description}}</td>
                                <td >{{$act->accompanying_officer}}</td>
                                <td >
                                    @if ($act->status_activity =='complete')
                                    <div class="badge badge-success">Complete</div>
                                    @elseif ($act->status_activity =='cancel')
                                    <div class="badge badge-danger">Cancel</div>
                                    @else
                                    <div class="badge badge-warning">Pending</div>
                                    @endif
                                </td>
                                <td >{{$act->created_at}}</td>
                                <td >{{$act->updated_at}}</td>
                                <td style="width: 75px">
                                    <ul class="nav">
                                        @if ($act->status_activity == 'pending')

                                        <a href="{{route ('activity.edit', $act->id)}}" class="btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                        &nbsp;
                                        <a href="/cancel-activity/{{$act->id}}" class="btn-sm btn-danger" onclick="confirmation(event)"><i class="fa fa-window-close"></i></a>
                                        @endif

                                        @if ($act->status_activity == 'complete')

                                        <a href="{{route ('activity.full-detail-activity', $act->id)}}" class="btn-sm btn-primary"><i class="fa fa-search-location"></i></a>
                                        @endif
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
