@extends('layouts.main')
@section('content')

    <div class="container">
        <div class="col-12">
            <div class="card shadow">
              <div class="card-header">
                <h4>Cetak jadwal kegiatan</h4>
              </div>
              <div class="card-body">
                <form action="{{route('activity.downloadTimeline')}}" method="POST">
                    @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label>Tanggal Awal </label>
                        <input type="date" name="tglawal" class="form-control" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label>Tanggal Akhir </label>
                        <input type="date" name="tglakhir" class="form-control" required>
                    </div>
                </div>

                  <div class="form-group">
                    <div class="text-right">
                        <input type="submit" value="Search" onClick="this.form.submit(); this.disabled=true; this.value='Proses…'; "  class="btn btn-success">
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

    </div>
@endsection
